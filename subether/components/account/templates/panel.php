<? /*******************************************************************************
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
*******************************************************************************/ ?>
<div id="Panel" class="Panel">

	<div>
	<?
		
		$tabs = array( 
			'general'=>'General'/*, 
			'security'=>'Security', 
			'divider'=>'', 
			'privacy'=>'Privacy', 
			'tagging'=>'Tagging', 
			'blocking'=>'Blocking',
			'divider'=>'',
			'notifications'=>'Notifications',
			'mobile'=>'Mobile',
			'followers'=>'Followers',
			'divider'=>'',
			'apps'=>'Apps',
			'ads'=>'Ads',
			'payments'=>'Payments',
			'gifts'=>'Gifts',
			'support'=>'Support'*/
		);
		
		if( $tabs )
		{
			$str .= '<ul>';
			foreach( $tabs as $k=>$t )
			{
				if( $k == 'divider' )
				{
					$str .= '<li class="divider"></li>';
				}
				else
				{
					$str .= '<li class="current">';
					$str .= '<div>';
					$str .= '<a href="' . $this->parent->nav . $k . '/">';
					$str .= '<span></span>';
					$str .= '<span>' . i18n( 'i18n_' . $t ) . '</span>';
					$str .= '<span></span>';
					$str .= '</a>';
					$str .= '</div>';
					$str .= '</li>';
				}
			}
			$str .= '</ul>';
			return $str;
		}
	?>
	</div>
	
</div>
