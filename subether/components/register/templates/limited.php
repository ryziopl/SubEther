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
<div class="limitedbox">
	<!--<table>
		<tr>
			<td class="LeftCol">
				<div id="InfoBox">
					<div>
						<h2>Decentralization</h2>
						<p>Instead of everyone’s data being contained on huge central servers owned by a large organization, local servers (“nodes”) can be set up anywhere in the world. You choose which node to register with - perhaps your local node - and seamlessly connect with the subether community worldwide.</p>
					</div>
					<div>
						<h2>Freedom</h2>
						<p>You can be whoever you want to be in subether. Unlike some networks, you don’t have to use your real identity. You can interact with whomever you choose in whatever way you want. The only limit is your imagination. subether is also Free Software, giving you liberty to use it as you wish.</p>
					</div>
					<div>
						<h2>Privacy</h2>
						<p>In subether you own your data. You do not sign over any rights to a corporation or other interest who could use it. With subether, your friends, your habits, and your content is your business ... not ours! In addition, you choose who sees what you share, using Permissions.</p>
					</div>
				</div>
			</td>
			<td class="RightCol">-->
				<div id="SignupBox">
					<form id="LimitedForm" name="Limited" action="<?= $this->parent->mpath ?>?component=register&action=limited" method="post">
						<div class="heading">
							<h2>Create Limited Accounts</h2>
						</div>
						<table>
							<?if( isset( $this->Groups ) && $this->Groups ) { ?>
							<tr class="Row1">
								<td class="Col1">Group: </td>
								<td class="Col2"><select name="Group"><?= $this->Groups ?></select></td>
							</tr>
							<? } ?>
							<tr class="Row2">
								<td class="Col1">Receiver Email: </td>
								<td class="Col2"><input type="email" name="Email" placeholder="Email here"/></td>
							</tr>
							<tr class="Row3">
								<td class="Col1">Account Numbers: </td>
								<td class="Col2"><select name="Accounts"><? $str = ''; for( $a = 1; $a <= 100; $a++ ) $str .= '<option value="' . $a . '">' . $a . '</option>'; return $str; ?></select></td>
							</tr>
							<tr class="Row4">
								<td class="Col1">Expiry Date: </td>
								<td class="Col2"><input name="Expiry" value="<?= date( 'Y-m-d H:i:s', mktime( 0, 0, 0, date('m'), date('d')+1, date('Y') ) ) ?>"/></select></td>
							</tr>
							<tr class="ButtonRow">
								<!--<td class="Col1"></td>-->
								<td class="Col2 buttons" colspan="2" style="text-align:left;">
									<?if( IsSystemAdmin() ) { ?>
									<input type="checkbox" name="StoreKey" style="width:auto;margin-right:5px;position:relative;top:1px;margin-top:12px;"/><span style="margin-top:12px;">Store key in database</span>
									<? } ?>
									<button type="button" style="float:right;"><span>Create</span></button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			<!--</td>
		</tr>
	</table>-->
</div>

<script> initLimited(); </script>
