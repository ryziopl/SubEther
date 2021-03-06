<?php

/*******************************************************************************
*   SubEther, The Decentralized Network.                                       *
*   Copyright (C) 2012 Friend Studios AS                                       *
*                                                                              *
*   This program is free software: you can redistribute it and/or modify       *
*   it under the terms of the GNU Affero General Public License as             *
*   published by the Free Software Foundation, either version 3 of the         *
*   License, or (at your option) any later version.                            *
*                                                                              *
*   This program is distributed in the hope that it will be useful,            *
*   but WITHOUT ANY WARRANTY; without even the implied warranty of             *
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the              *
*   GNU Affero General Public License for more details.                        *
*                                                                              *
*   You should have received a copy of the GNU Affero General Public License   *
*   along with this program.  If not, see <https://www.gnu.org/licenses/>.     *
*******************************************************************************/

global $database;

require ( 'subether/functions/userfuncs.php' );

// Set header
setXmlHeader();

// Set limit
$limit = 300;

// Loop limit (10min)
$loop = 600;

$required = array(
	'SessionID' 
);

$options = array(
	'LastActivity', 'LastActivityID', 'Limit', 'Loop', 'Encoding', 'Kill', 'Test'
);



if ( isset( $_REQUEST ) || isset( $_POST ) )
{
	// Temporary to view data i browser for development
	if( !$_POST )
	{
		if( isset( $_REQUEST['route'] ) )
		{
			unset( $_REQUEST['route'] );
		}
		
		$_POST = $_REQUEST;
	}	
	
	foreach( $_POST as $k=>$p )
	{
		if( !in_array( $k, $required ) && !in_array( $k, $options ) )
		{
			throwXmlError ( MISSING_PARAMETERS, false, 'relations' );
		}
	}
	foreach( $required as $r )
	{
		if( !isset( $_POST[$r] ) )
		{
			throwXmlError ( MISSING_PARAMETERS, false, 'relations' );
		}
	}
	
	// Get User data from sessionid
	$sess = new dbObject ( 'UserLogin' );
	$sess->Token = $_POST['SessionID'];
	if ( $sess->Load () )
	{
		$u = new dbObject ( 'SBookContact' );
		$u->UserID = $sess->UserID;
		if( !$u->Load () )
		{
			throwXmlError ( AUTHENTICATION_ERROR, false, 'relations' );
		}
	}
	else
	{
		throwXmlError ( SESSION_MISSING, false, 'relations' );
	}
	
	$i = 0; $heartbeat = 0; $str = 'pong ...';
	
	//set php runtime to unlimited
	set_time_limit(0);
	
	$ts = strtotime( date( 'Y-m-d H:i:s' ) );
	
	if( isset( $_POST['Loop'] ) )
	{
		$loop = $_POST['Loop'];
	}
	
	if( isset( $_POST['LastActivity'] ) && !$_POST['LastActivity'] )
	{
		$_POST['LastActivity'] = strtotime( date( 'Y-m-d H:i:s' ) );
	}
	else if( isset( $_POST['LastActivity'] ) && strstr( $_POST['LastActivity'], '-' ) )
	{
		$_POST['LastActivity'] = $ts = strtotime( $_POST['LastActivity'] );
	}
	
	
	
	// Gather Contact list once per request to use for checking what's new
	
	$minutedelay = mktime( date('H',$ts), date('i',$ts)-1, date('s',$ts), date('m',$ts), date('d',$ts), date('Y',$ts) );
	
	$contacts = array(); $relations = array(); $online = array();
	
	if( $data = fetchObjectRows( '
		SELECT 
			c.ID, r.ID AS RelationID, s.LastHeartbeat 
		FROM 
			SBookContactRelation r, 
			SBookContact c 
				LEFT JOIN UserLogin s ON 
				( 
						c.UserID > 0 
					AND s.UserID = c.UserID 
					AND s.LastHeartbeat >= \'' . date( 'Y-m-d H:i:s', $minutedelay ) . '\' 
				)
		WHERE 
			(
				(   	r.ContactID = \'' . $u->ID . '\'  
					AND r.ObjectType = "SBookContact" 
					AND c.ID = r.ObjectID 
				) 
				OR
				(   	r.ObjectID = \'' . $u->ID . '\' 
					AND r.ObjectType = "SBookContact" 
					AND c.ID = r.ContactID 
				)
			)
		ORDER BY
			c.ID ASC 
	' ) )
	{
		foreach( $data as $dta )
		{
			$contacts[$dta->ID] = $dta->ID;
			
			if( isset( $dta->LastHeartbeat ) && $dta->LastHeartbeat )
			{
				$online[$dta->ID] = $dta->ID;
			}
		}
	}
	
	
	
	// main loop
	while ( !connection_aborted() )
	{
		if( isset( $_REQUEST['Kill'] ) )
		{
			die( 'ws: has been killed' );
		}
		
		// PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
		clearstatcache();
		
		if( isset( $_POST['LastActivity'] ) || isset( $_POST['LastActivityID'] ) )
		{
			$str = ( $str == 'ping ... ' ? 'pong ... ' : 'ping ... ' );
			
			echo " ";
			
        	ob_flush();
        	flush();
			
			if( $i >= $loop )
			{
				ob_end_clean();
				
				throwXmlMsg ( NO_NEW_UPDATES, false, 'relations' );
				
				break;
			}
			
			// Update heartbeat every 30sec to keep the user from going offline after 1min of long-polling
			$heartbeat = heartbeat( $_POST['SessionID'], $heartbeat, 30 );
		}
		else if( $i >= 1 )
		{
			break;
		}
		
		$i++;
		
		$upids = array(); $status = array();
		
		$lmsg = array(); $uonl = array();
		
		$lastactivity = 0; $typeactivity = ''; $lastactivityid = 0; $contactactivity = false; $activitydata = array();
		
		
		
		$minutedelay = mktime( date('H'), date('i')-1, date('s'), date('m'), date('d'), date('Y') );
		
		
		// 1: Online / Offline check -----------------------------------------------------------------------------------
		
		if( $contacts )
		{
			foreach( $contacts as $cnt )
			{
				$status[$cnt] = false;
			}
		
			if( $onls = fetchObjectRows( '
				SELECT 
					c.ID AS ContactID, 
					s.* 
				FROM 
					SBookContact c, 
					UserLogin s 
				WHERE 
						c.ID IN (' . ( $contacts ? implode( ',', $contacts ) : 'NULL' ) . ') 
					AND c.UserID > 0 
					AND s.UserID = c.UserID 
					AND s.LastHeartbeat >= \'' . date( 'Y-m-d H:i:s', $minutedelay ) . '\' 
			' ) )
			{
				foreach( $onls as $onl )
				{
					$onl->IsOnline = 1;
					
					$uonl[$onl->UserID] = $onl;
					
					// TODO: Look at this status thing, probably don't need it ... 
					$status[$onl->ContactID] = $onl->ID . '|' . $onl->LastHeartbeat . ' >= ' . date( 'Y-m-d H:i:s', $minutedelay );
				
					// If was offline and is now online ...
					
					if( !$online || !in_array( $onl->ContactID, $online ) )
					{
						$upids[$onl->ContactID] = $onl->ContactID;
						
						$tao = new stdClass();
						$tao->type = 'Heartbeat';
						$tao->action = 'online';
						$tao->id = $onl->ContactID;
						$tao->timestamp = strtotime( date( 'Y-m-d H:i:s' ) );
						
						if( !$contactactivity && $onl->LastHeartbeat && $lastactivity < strtotime( $onl->LastHeartbeat ) )
						{
							$typeactivity = json_encode( $tao );
							$lastactivity = strtotime( $onl->LastHeartbeat );
						}
						
						$activitydata[] = $tao;
					}
				
					$online[$onl->ContactID] = $onl->ContactID;
				}
			}
		}
		
		// If was online and now offline ...
		
		if( $online )
		{
			foreach( $online as $on )
			{
				if( ( isset( $status[$on] ) && !$status[$on] ) || !isset( $status[$on] ) )
				{
					$upids[$on] = $on;
					
					$tao = new stdClass();
					$tao->type = 'Heartbeat';
					$tao->action = 'offline';
					$tao->id = $on;
					$tao->timestamp = strtotime( date( 'Y-m-d H:i:s' ) );
					
					if( !$contactactivity )
					{
						$typeactivity = json_encode( $tao );
						$lastactivity = strtotime( date( 'Y-m-d H:i:s' ) );
						
						if( isset( $online[$on] ) )
						{
							unset( $online[$on] );
						}
					}
					
					$activitydata[] = $tao;
				}
			}
		}
		
		// 2: Contacts and new or edited relations check ---------------------------------------------------------------
		
		// 3: LastMessages check ---------------------------------------------------------------------------------------
		
		// TODO: Make it event ID based as secondary ...
		// TODO: Get more then one event ...
		
		if( isset( $_POST['LastActivity'] ) || isset( $_POST['LastActivityID'] ) )
		{
			if( $updates = fetchObjectRows( $q = '
				SELECT * 
				FROM UserActivity 
				WHERE ' . ( isset( $_POST['LastActivityID'] ) ? 'ID > ' . $_POST['LastActivityID'] : 'LastUpdate >= ' . $_POST['LastActivity'] ) . ' 
				AND 
				( 
					( 
							Component = "messages" 
						AND Type = "lastmessage" 
						AND 
						( 
							ContactID = ' . $u->ID . ' OR UserID = ' . $u->ID . ' 
						)
					) 
					OR 
					( 
							Component = "contacts" 
						AND Type = "relations" 
						AND 
						( 
							ContactID = ' . $u->ID . ' OR UserID = ' . $u->ID . ' 
						) 
					) 
					' . ( $contacts ? '
					OR
					( 
							Component = "contacts" 
						AND Type = "contact" 
						AND UserID IN (' . implode( ',', $contacts ) . ') 
					) 
					' : '' ) . '
				) 
				ORDER BY ID DESC 
			' ) )
			{
				foreach( $updates as $upt )
				{
					$upt->Contact = ( $upt->ContactID > 0 && $upt->ContactID != $u->ID ? $upt->ContactID : $upt->UserID );
					
					switch( $upt->Type )
					{
						case 'relations':
							
							$tao = new stdClass();
							$tao->event = $upt->ID;
							$tao->type = 'Relation';
							$tao->action = 'update';
							$tao->id = $upt->Contact;
							$tao->typeid = $upt->TypeID;
							$tao->timestamp = $upt->LastUpdate;
							
							if( $upt->LastUpdate && $lastactivity < $upt->LastUpdate )
							{
								$typeactivity = json_encode( $tao );
								$lastactivity = $upt->LastUpdated;
								
								$contactactivity = true;
							}
							
							$activitydata[] = $tao;
							
							$lastactivityid = ( $upt->ID > $lastactivityid ? $upt->ID : $lastactivityid );
							
							break;
						
						case 'contact':
							
							$tao = new stdClass();
							$tao->event = $upt->ID;
							$tao->type = 'Contact';
							$tao->action = 'update';
							$tao->id = $upt->Contact;
							$tao->typeid = $upt->TypeID;
							$tao->timestamp = $upt->LastUpdate;
							
							if( $upt->LastUpdate && $lastactivity < $upt->LastUpdate )
							{
								$typeactivity = json_encode( $tao );
								$lastactivity = $upt->LastUpdate;
					
								$contactactivity = true;
							}
							
							$activitydata[] = $tao;
							
							$lastactivityid = ( $upt->ID > $lastactivityid ? $upt->ID : $lastactivityid );
							
							break;
						
						case 'lastmessage':
							
							$tao = new stdClass();
							$tao->event = $upt->ID;
							$tao->type = 'Message';
							$tao->action = 'new';
							$tao->id = $upt->Contact;
							$tao->typeid = $upt->TypeID;
							$tao->timestamp = $upt->LastUpdate;
							
							if( $upt->LastUpdate && $lastactivity < $upt->LastUpdate && !$contactactivity )
							{
								$typeactivity = json_encode( $tao );
								$lastactivity = $upt->LastUpdate;
							}
							
							$activitydata[] = $tao;
							
							$lastactivityid = ( $upt->ID > $lastactivityid ? $upt->ID : $lastactivityid );
							
							break;
					}
					
					$contacts[$upt->Contact] = $upt->Contact;
					
					$upids[$upt->Contact] = $upt->Contact;
				}
				
				if( $activitydata )
				{
					$activitydata = array_reverse( $activitydata );
				}
				
				//die( print_r( $updates,1 ) . ' [] ' . print_r( $tao,1 ) . ' [] ' . $contactactivity . ' [] ' . $q );
			}
		}
		
		
		
		
		
		// Get the list ------------------------------------------------------------------------------------------------
		
		if( ( !isset( $_POST['LastActivity'] ) && !isset( $_POST['LastActivityID'] ) || isset( $_POST['LastActivity'] ) && $upids || isset( $_POST['LastActivityID'] ) && $upids ) && ( $rows = fetchObjectRows( '
			SELECT 
				r.ID AS RelationID, 
				r.IsNoticed, 
				r.IsApproved, 
				r.ContactID AS SenderID, 
				r.ObjectID AS ReceiverID, 
				r.DateModified AS RelationModified, 
				c.ID, 
				c.ImageID, 
				c.UserID, 
				c.Firstname, 
				c.Middlename, 
				c.Lastname, 
				c.Display, 
				c.Username,
				c.Email,
				c.Telephone,
				c.Mobile,
				c.NodeID,
				c.NodeMainID,
				c.DateModified AS ContactModified, 
				u.UniqueID,
				u.PublicKey
			FROM 
				Users u, 
				SBookContact c 
					LEFT JOIN SBookContactRelation r ON 
					( 
						( 
								r.ContactID = \'' . $u->ID . '\' 
							AND r.ObjectType = "SBookContact" 
							AND c.ID = r.ObjectID 
						) 
						OR 
						( 
								r.ObjectID = \'' . $u->ID . '\' 
							AND r.ObjectType = "SBookContact" 
							AND c.ID = r.ContactID 
						) 
					) 
			WHERE 
					u.IsDeleted = "0" 
				AND u.ID = c.UserID 
				AND c.UserID > 0 
				' . ( isset( $_POST['LastActivity'] ) || isset( $_POST['LastActivityID'] ) ? '
				AND c.ID IN (' . ( $upids ? implode( ',', $upids ) : 'NULL' ) . ') 
				' : '
				AND 
				( 
					( 
							r.ContactID = \'' . $u->ID . '\' 
						AND r.ObjectType = "SBookContact" 
						AND c.ID = r.ObjectID 
					) 
					OR 
					( 
							r.ObjectID = \'' . $u->ID . '\' 
						AND r.ObjectType = "SBookContact" 
						AND c.ID = r.ContactID 
					) 
				) 
				' ) . '
			ORDER BY
				c.Firstname ASC,
				c.Username ASC 
			LIMIT ' . ( isset( $_POST['Limit'] ) && $_POST['Limit'] ? $_POST['Limit'] : $limit ) . '
		' ) ) )
		{
			$xml = ''; $json = new stdClass(); $iii = array(); $listed = 0; $im = array();
			
			$ids = array(); $uids = array(); $unnoticed = array();
			
			foreach( $rows as $row )
			{
				if( $row->UserID )
				{
					$uids[$row->UserID] = $row->UserID;
				}
				
				if( $row->ID )
				{
					$ids[$row->ID] = $row->ID;
				}	
			}
			
			// LastMessages pr contact ...
			
			if( $ids && ( $msgs = fetchObjectRows( '
				SELECT 
					c.ID, 
					MAX(m.Date) AS Date, 
					MAX(m.ID) AS MessageID 
				FROM 
					SBookMail m, 
					SBookContact c 
				WHERE 
					( 
						( 
								m.SenderID IN ( ' . implode( ',', $ids ) . ' ) 
							AND m.ReceiverID = ' . $u->ID . ' 
							AND c.ID = m.SenderID 
						) 
						OR 
						( 
								m.ReceiverID IN ( ' . implode( ',', $ids ) . ' ) 
							AND m.SenderID = ' . $u->ID . ' 
							AND m.Type != "cm" 
							AND c.ID = m.ReceiverID 
						) 
					) 
					AND m.Message != "" 
				GROUP BY 
					c.ID 
			' ) ) )
			{
				$imsg = array();
				
				foreach( $msgs as $msg )
				{
					// TODO: Make this a message object ... not just ID for lastmessage
					
					$imsg[$msg->ID] = $msg->MessageID;
					
				}
				
				
				
				if( $imsg && ( $mgs = $database->fetchObjectRows ( '
					SELECT 
						m.*, 
						m.EncryptionKey AS CryptoKey, 
						c.ID AS PosterID, 
						c.ImageID, 
						c.Firstname, 
						c.Middlename, 
						c.Lastname, 
						c.Display, 
						c.Username 
					FROM 
						SBookMail m, 
						SBookContact c  
					WHERE 
							m.ID IN ( ' . ( $imsg ? implode( ',', $imsg ) : 'NULL' ) . ' ) 
						AND m.Message != "" 
						AND m.SenderID > 0 
						AND m.ReceiverID > 0 
						AND
						( 
							( 
									m.ReceiverID = ' . $u->ID . ' 
								AND c.ID = m.SenderID 
							) 
							OR 
							( 
									m.SenderID = ' . $u->ID . ' 
								AND m.Type != "cm" 
								AND c.ID = m.SenderID 
							) 
						) 
					ORDER BY
						m.Date DESC 
				' ) ) ) 
				{
					foreach( $mgs as $mg )
					{
						$cnt = ( $mg->SenderID == $u->ID ? $mg->ReceiverID : $mg->SenderID );
						
						$lmsg[$cnt] = $mg;
					}
				}
				
			}
			
			// If this slows things down then move to the union where you have a limit on how much unread messages you can show pr user ...
			
			if( $ids && ( $unseen = fetchObjectRows( '
				SELECT 
					m.ID, m.SenderID 
				FROM 
					SBookMail m 
				WHERE 
						m.SenderID IN (' . implode( ',', $ids ) . ') 
					AND m.ReceiverID = \'' . $u->ID . '\' 
					AND m.Message != "" 
					AND m.IsNoticed = "0" 
				ORDER BY 
					m.ID DESC 
				LIMIT 100 
			' ) ) )
			{
				foreach( $unseen as $un )
				{
					if( !isset( $unnoticed[$un->SenderID] ) )
					{
						$unnoticed[$un->SenderID] = [];
					}
					
					$unnoticed[$un->SenderID][] = $un->ID;
				}
			}
			
			// Only return data that is relevant first time all and when polling only return what is changed ...
			
			// --- Show the whole contact list -------------------------------------------------------------------------
			
			$json->Relations = []; $json->Requests = [];
			
			foreach ( $rows as $row )
			{
				$us = false; $on = false; $lm = false;
			
				// If contact is from another node continue
				if( $row->NodeID > 0 )
				{
					continue;
				}
				
				$act = ( isset( $uonl[$row->UserID] ) ? $uonl[$row->UserID] : false );
				$lms = ( isset( $lmsg[$row->ID] ) ? $lmsg[$row->ID] : false );
				$unm = ( isset( $unnoticed[$row->ID] ) ? $unnoticed[$row->ID] : false );
				
				switch ( $row->Display )
				{
					case 1:
						$row->Name = trim( $row->Firstname . ' ' . $row->Middlename . ' ' . $row->Lastname );
						break;
					case 2:
						$row->Name = trim( $row->Firstname . ' ' . $row->Lastname );
						break;
					case 3:
						$row->Name = trim( $row->Lastname . ' ' . $row->Firstname );
						break;
					default:
						$row->Name = $row->Username;
						break;
				}
				
				if( $act )
				{
					$row->LastActivity = $act->LastHeartbeat;
					$row->DataSource   = $act->DataSource;
					$row->UserAgent    = $act->UserAgent;
					$row->IsOnline	   = $act->IsOnline;
				}
				
				$row->OnlineStatus = $act;
				$row->Status       = ( isset( $row->IsApproved ) ? ( $row->IsApproved ? 'Contact' : 'Pending' ) : 'Removed' );
			
				$xml .= '<' . ( $row->Status == 'Pending' ? 'Requests' : 'Relations' ) . '>';
				$xml .= '<ID>' . $row->ID . '</ID>';
				$xml .= '<UniqueID>' . $row->UniqueID . '</UniqueID>';
				$xml .= '<PublicKey><![CDATA[' . $row->PublicKey . ']]></PublicKey>';
				$xml .= '<Username><![CDATA[' . $row->Username . ']]></Username>';
				$xml .= '<Name><![CDATA[' . $row->Name . ']]></Name>';
				$xml .= '<Email><![CDATA[' . $row->Email . ']]></Email>';
				$xml .= '<Telephone><![CDATA[' . $row->Telephone . ']]></Telephone>';
				$xml .= '<Mobile><![CDATA[' . $row->Mobile . ']]></Mobile>';
				$xml .= '<UserID>' . $row->UserID . '</UserID>';
				$xml .= '<ImageID>' . $row->ImageID . '</ImageID>';
				
				if( $row->ImageID > 0 )
				{
					$im[$row->ImageID] = $row->ImageID;
				}
				
				$obj = new stdClass();
				$obj->ID        = $row->ID;
				$obj->UniqueID  = $row->UniqueID;
				$obj->PublicKey = $row->PublicKey;
				$obj->Username  = $row->Username;
				$obj->Name      = $row->Name;
				$obj->Email     = $row->Email;
				$obj->Telephone = $row->Telephone;
				$obj->Mobile    = $row->Mobile;
				$obj->UserID    = $row->UserID;
				$obj->ImageID   = $row->ImageID;
			
				if( isset( $row->SenderID ) )
				{
					$xml .= '<SenderID>' . $row->SenderID . '</SenderID>';
					$xml .= '<ReceiverID>' . $row->ReceiverID . '</ReceiverID>';
				
					$obj->SenderID   = $row->SenderID;
					$obj->ReceiverID = $row->ReceiverID;
				}
			
				if( isset( $row->IsNoticed ) )
				{
					$xml .= '<IsNoticed>' . $row->IsNoticed . '</IsNoticed>';
					$xml .= '<IsApproved>' . $row->IsApproved . '</IsApproved>';
				
					$obj->IsNoticed  = $row->IsNoticed;
					$obj->IsApproved = $row->IsApproved;
				}
				
				$xml .= '<UnSeenMessages>' . ( $unm ? count( $unm ) : 0 ) . '</UnSeenMessages>';
				
				$obj->UnSeenMessages = ( $unm ? count( $unm ) : 0 );
				
				if( $lms && is_object( $lms ) )
				{
					$xml .= '<LastMessage>' . $lms->ID . '</LastMessage>';
					
					$obj->LastMessage = $lms->ID;
					
					switch ( $lms->Display )
					{
						case 1:
							$lms->Poster = trim( $lms->Firstname . ' ' . $lms->Middlename . ' ' . $lms->Lastname );
							break;
						case 2:
							$lms->Poster = trim( $lms->Firstname . ' ' . $lms->Lastname );
							break;
						case 3:
							$lms->Poster = trim( $lms->Lastname . ' ' . $lms->Firstname );
							break;
						default:
							$lms->Poster = $lms->Username;
							break;
					}
					
					$xml .= '<LastMessageData>';
					$xml .= '<ID>' . $lms->ID . '</ID>';
					$xml .= '<UniqueID>' . $lms->UniqueID . '</UniqueID>';
					$xml .= '<ImageID>' . $lms->ImageID . '</ImageID>';
					$xml .= '<PosterID>' . $lms->PosterID . '</PosterID>';
					$xml .= '<Poster><![CDATA[' . $lms->Poster . ']]></Poster>';
					$xml .= '<Message><![CDATA[' . $lms->Message . ']]></Message>';
					$xml .= '<CategoryID>' . $lms->CategoryID . '</CategoryID>';
					$xml .= '<Type>' . $lms->Type . '</Type>';
					$xml .= '<Encryption>' . $lms->Encryption . '</Encryption>';
					$xml .= '<CryptoID>' . $lms->UniqueKey . '</CryptoID>';
					
					$olm = new stdClass();
					$olm->ID         = $lms->ID;
					$olm->UniqueID   = $lms->UniqueID;
					$olm->ImageID    = $lms->ImageID;
					$olm->PosterID   = $lms->PosterID;
					$olm->Poster     = $lms->Poster;
					$olm->Message    = $lms->Message;
					$olm->CategoryID = $lms->CategoryID;
					$olm->Type       = $lms->Type;
					$olm->Encryption = $lms->Encryption;
					$olm->CryptoID   = $lms->UniqueKey;
					
					if( $lms->Type == 'cm' )
					{
						$xml .= '<CryptoKey><![CDATA[' . $lms->CryptoKey . ']]></CryptoKey>';
						$xml .= '<PublicKey><![CDATA[' . $lms->PublicKey . ']]></PublicKey>';
						
						$olm->CryptoKey = $lms->CryptoKey;
						$olm->PublicKey = $lms->PublicKey;
					}
					
					$xml .= '<IsCrypto>' . $lms->IsCrypto . '</IsCrypto>';
					$xml .= '<IsTyping>' . $lms->IsTyping . '</IsTyping>';
					$xml .= '<IsRead>' . $lms->IsRead . '</IsRead>';
					$xml .= '<IsNoticed>' . $lms->IsNoticed . '</IsNoticed>';
					$xml .= '<IsAlerted>' . $lms->IsAlerted . '</IsAlerted>';
					$xml .= '<IsAccepted>' . $lms->IsAccepted . '</IsAccepted>';
					$xml .= '<IsConnected>' . $lms->IsConnected . '</IsConnected>';
					$xml .= '<Date>' . $lms->Date . '</Date>';
					$xml .= '<DateModified>' . $lms->DateModified . '</DateModified>';
					$xml .= '<TimeCreated>' . strtotime( $lms->Date ) . '</TimeCreated>';
					$xml .= '<TimeModified>' . strtotime( $lms->DateModified ) . '</TimeModified>';
					$xml .= '</LastMessageData>';
					
					$olm->IsCrypto     = $lms->IsCrypto;
					$olm->IsTyping     = $lms->IsTyping;
					$olm->IsRead       = $lms->IsRead;
					$olm->IsNoticed    = $lms->IsNoticed;
					$olm->IsAlerted    = $lms->IsAlerted;
					$olm->IsAccepted   = $lms->IsAccepted;
					$olm->IsConnected  = $lms->IsConnected;
					$olm->Date         = $lms->Date;
					$olm->DateModified = $lms->DateModified;
					$olm->TimeCreated  = strtotime( $lms->Date );
					$olm->TimeModified = strtotime( $lms->DateModified );
					
					$obj->LastMessageData = $olm;
				}
				
				if( $row->OnlineStatus )
				{
					$xml .= '<LastActivity>' . strtotime( $row->LastActivity ) . '</LastActivity>';
					
					$obj->LastActivity = strtotime( $row->LastActivity );
					
					if( $row->IsOnline )
					{
						$on = true; $iii[$row->ID] = $row->ID;
					}
				}
				
				if( $on )
				{
					$xml .= '<IsOnline>1</IsOnline>';
				
					$obj->IsOnline = 1;
				}
				else
				{
					$xml .= '<IsOnline>0</IsOnline>';
				
					$obj->IsOnline = 0;
				}
				
				$xml .= '<Status>' . $row->Status . '</Status>';
				$xml .= '</' . ( $row->Status == 'Pending' ? 'Requests' : 'Relations' ) . '>';
				
				$obj->Status = $row->Status;
			
				$json->{( $row->Status == 'Pending' ? 'Requests' : 'Relations' )}[] = $obj;
			
				$listed++;
			}
			
			if( $im )
			{
				$xml .= '<Images>' . implode( ',', $im ) . '</Images>';
			
				$json->Images = implode( ',', $im );
			}
			
			if( $contacts )
			{
				$xml .= '<Contacts>' . count( $contacts ) . '</Contacts>';
			
				$json->Contacts = count( $contacts );
			}
			
			$xml .= '<Listed>' . $listed . '</Listed>';
			$xml .= '<LastActivity>' . ( $lastactivity ? (int)$lastactivity : 0 ) . '</LastActivity>';
			$xml .= '<TypeActivity>' . $typeactivity . '</TypeActivity>';
			$xml .= '<LastActivityID>' . $lastactivityid . '</LastActivityID>';
			$xml .= '<LastActivityData>' . ( $activitydata ? json_encode( $activitydata ) : '' ) . '</LastActivityData>';
			$xml .= '<Online>' . ( $online ? count( $online ) : 0 ) . '</Online>';
			$xml .= '<ID>' . $u->ID . '</ID>';
			
			$json->Listed           = $listed;
			$json->LastActivity     = ( $lastactivity ? (int)$lastactivity : 0 );
			$json->TypeActivity     = $typeactivity;
			$json->LastActivityID   = $lastactivityid;
			$json->LastActivityData = ( $activitydata ? $activitydata : '' );
			$json->Online           = ( $online ? count( $online ) : 0 );
			$json->ID               = $u->ID;
			
			
			
			ob_end_clean();
			
			outputXML ( isset( $_REQUEST['Encoding'] ) && $_REQUEST['Encoding'] == 'json' ? $json : $xml, false, 'relations' );
			
			break;
		}
		
		if( isset( $_POST['LastActivity'] ) || isset( $_POST['LastActivityID'] ) )
		{
			// 1 sec loop delay ...
			sleep( 1 );
		}
		
		continue;
	}
	
	ob_end_clean();
	
	throwXmlMsg ( EMPTY_LIST, false, 'relations' );
}

ob_end_clean();

throwXmlError ( MISSING_PARAMETERS, false, 'relations' );

?>
