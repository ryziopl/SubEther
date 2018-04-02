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

$f = new dbObject ( 'ContentDataSmall' );
if ( $f->load ( $_POST[ 'fid' ] ) )
{
	$conf = CreateObjectFromString ( $f->DataMixed );
	$conf->Type = $_POST[ 'type' ];
	$conf->Site = $_POST[ 'site' ];
	$conf->Components = $_POST['components'];
	$f->DataMixed = CreateStringFromObject ( $conf );
	$f->save ();
	die ( 'ok' );
}
die ( 'fail' );

?>
