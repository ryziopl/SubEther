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

global $document, $webuser;

statistics( $parent->module, 'meeting' );

$root = 'subether/';
$cbase = 'subether/components/meeting';
$folder = $Component->parent->folder;

// Setup resources -------------------------------------------------------------
$document->addResource ( 'stylesheet', $cbase . '/css/meeting.css' );
//$document->addResource ( 'javascript', 'https://s3.amazonaws.com/plivosdk/web/plivo.min.js' );
$document->addResource ( 'javascript', $cbase . '/javascript/voicechat.js' );
$document->addResource ( 'javascript', $cbase . '/javascript/meeting.js' );

// Template: Module, Component, CategoryID, Status
SessionSet ( $parent->module, 'meeting', $parent->folder->CategoryID, 'online' );

// Check for user actions ------------------------------------------------------
if ( isset( $_REQUEST[ 'action' ] ) )
{
	if ( file_exists ( $cbase . '/actions/' . $_REQUEST[ 'action' ] . '.php' ) )
    {
       include ( $cbase . '/actions/' . $_REQUEST[ 'action' ] . '.php' );
    }
	die( 'failed action request - meeting' );
}
// Check for user functions ----------------------------------------------------
else if ( isset( $_REQUEST[ 'function' ] ) )
{
	if ( file_exists ( $cbase . '/functions/' . $_REQUEST[ 'function' ] . '.php' ) )
    {
       include ( $cbase . '/functions/' . $_REQUEST[ 'function' ] . '.php' );
    }
	else if ( file_exists ( $root . '/include/' . $_REQUEST[ 'function' ] . '.php' ) )
	{
		include ( $root . '/include/' . $_REQUEST[ 'function' ] . '.php' );
	}
	die( 'failed function request - meeting' );
}

//include ( $cbase . '/include/voicechat.php' );
include ( $cbase . '/functions/meeting.php' );
//include ( $cbase . '/functions/teamspeak.php' );

$Component->Participants = $pstr;
$Component->ChatMessages = $mstr;
$Component->WebCams = $wstr;

$Component->Teamspeak = $tstr;

statistics( $parent->module, 'meeting' );

?>