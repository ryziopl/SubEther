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

global $database, $webuser;

$str .= '<h4 class="heading pages"><span>Pages</span></h4><ul class="list pages">';

// TODO ADD OUTPUT TO PAGES WRITTEN IN ARENA CONNECTED TO USER
/*if ( $rows = $database->fetchObjectRows( '
	SELECT
		*
	FROM
		SBookAccounts
	WHERE
		UserID = \'' . $webuser->ID . '\'
	ORDER BY
		ID ASC
' ) )
{
	
	foreach( $rows as $r )
	{
		$str .= '<li' . ( $_REQUEST['accid'] == $r->ID ? ' class="current"' : '' ) . '>';
		$str .= '<a title="' . $r->Name . ' ' . account_format( $r->Account ) . '" href="en/home/bank/?accid=' . $r->ID . '">';
		$str .= '<span></span>';
		$str .= '<span>' . $r->Name . ' (<span' . ( $r->Disposable < 0 ? ' class="red"' : '' ) . '>' . number_format( $r->Disposable, 2, ',', '' ) . '</span>)</span>';
		$str .= '<span></span>';
		$str .= '</a>';
		$str .= '</li>';
	}
}*/

$str .= '<li class="create">';
$str .= '<a onclick="openWindow( \'Page\', false, \'controlpanel\' )" href="javascript:void(0)">';
$str .= '<span class="icon"></span>';
$str .= '<span class="create">Create a Page...</span>';
$str .= '<span></span>';
$str .= '</a>';
$str .= '</li>';
$str .= '</ul>';

?>
