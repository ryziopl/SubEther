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

global $document;

statistics( $parent->module, 'crowdfunding' );

$cbase = 'subether/components/crowdfunding';

// Setup resources -------------------------------------------------------------
//$document->addResource ( 'javascript', 'subether/thirdparty/javascript/ckeditor/ckeditor.js' );
$document->addResource ( 'javascript', $cbase . '/javascript/crowdfunding.js' );

// Check for user actions ------------------------------------------------------
if ( isset( $_REQUEST['action'] ) )
{
	if ( file_exists ( $cbase . '/actions/' . $_REQUEST['action'] . '.php' ) )
    {
       include ( $cbase . '/actions/' . $_REQUEST['action'] . '.php' );
    }
	die( 'failed action request - crowdfuding' );
}
// Check for user functions ----------------------------------------------------
if ( isset( $_REQUEST['function'] ) )
{
	if ( file_exists ( $cbase . '/functions/' . $_REQUEST['function'] . '.php' ) )
    {
       include ( $cbase . '/functions/' . $_REQUEST['function'] . '.php' );
    }
	die( 'failed function request - crowdfunding' );
}

$str = '';

if( isset( $_REQUEST[ 'p' ] ) )
{
	include ( $cbase . '/functions/details.php' );
}
else
{
	include ( $cbase . '/functions/crowdfunding.php' );
}

$Component->Content = $str;

statistics( $parent->module, 'crowdfunding' );

?>
