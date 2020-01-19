@extends('template')

@section('content')

	<script>
		function redglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#A70700';
			elem.style.backgroundColor = '#A70700';
			elem.style.backgroundImage = '{{ asset('img/title/ssredbright.jpg') }}';
		}

		function unredglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#570700';
			elem.style.backgroundColor = '#570700';
			elem.style.backgroundImage = '{{ asset('img/title/shinystonered.jpg') }}';
		}

		function greyglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#878787';
			elem.style.backgroundColor = '#777777';
			elem.style.backgroundImage = '{{ asset('img/title/ssgreybright.png') }}';
		}

		function ungreyglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#373737';
			elem.style.backgroundColor = '#474747';
			elem.style.backgroundImage = '{{ asset('img/stoneback.gif') }}';
		}
	</script>

	<div>
		<table
			style="width: 100%; padding: 0 15px;min-width: 500px"
			cellSpacing=0 cellpadding=0 background="{{ asset('img/background.jpg') }}">
			<tbody>
			<tr>
				<td>
					<div class="justify-content-center row text-center">
						<table cellSpacing=0 cellpadding=0 border=0>
							<tbody>
							<tr>
								<td>
									<CENTER><BR><span style="display: inline-block; margin: 0; width: 312px">
                  <table style="display: inline; width: 312px" cellSpacing=0 cellpadding=0>
                    <tbody>
                    <tr>
                      <td vAlign=top height=180>
						  <img style="display: block" height=100 src="{{ asset('img/title/rslogo.gif') }}"
							   width=312> <BR>
                        <CENTER><span style="font-size: 14px">
								There are currently {{ $online }} people playing!
							</span></CENTER>
							</td>
						</tr>
						</tbody>
					</table>
					</span>
											<span
												style="display: inline-block; margin: 0 0 0 20px; width: 430px">
                  <table style="display: inline; width: 430px" cellSpacing=0
						 cellpadding=0>
                    <tbody>
                    <tr>
                      <td vAlign=top>
                        <table cellSpacing=0 cellpadding=0 bgColor=black
							   border=0>
                          <tbody>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_topleft.gif') }}"
									 width=6>
							</td>
                            <td background="{{ asset('img/title/fm_top2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td><img height=6
									 src="{{ asset('img/title/fm_topright.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td background="{{ asset('img/title/fm_left.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
                            <td>
                              <CENTER><img height=7 src="{{ asset('img/title/blank.gif') }}" width=1><BR>
										  <B>
											  Latest News and Updates
										  </B><BR>
                              <table cellSpacing=0 cellpadding=0 bgColor=black>
								  <tbody>
                                <tr vAlign=top>
                                <td align=middle width=100>
									<A href="news.html">
										<img src="{{ asset('img/title/mm_scroll.jpg') }}" border=0>
									</A>
								</td>
                                <td width=320>
                                <CENTER>
                                <table height=130>
                                <tbody>
                                <tr>
                                <td>
                                <table width=320>
                                <tbody>
                                <tr>
                                <td>
									<A class=c href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=468">
										Rogue trader
									</A>
								</td>
                                <td align=right>
									15-Aug-2005
								</td>
								</tr>
                                <tr>
                                <td>
									<A class=c href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=466">
										Tai Bwo Wannai Clean-Up
									</A>
								</td>
                                <td align=right>
									9-Aug-2005
								</td>
								</tr>
                                <tr>
                                <td>
									<A class=c href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=465">
										Behind The Scenes - August
									</A>
								</td>
                                <td align=right>
									8-Aug-2005
								</td>
								</tr>
                                <tr>
                                <td>
									<A class=c href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=464">
										New York Servers Online
									</A>
								</td>
                                <td align=right>
									5-Aug-2005
								</td>
								</tr>
                                <tr>
                                <td>
									<A class=c href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=462">
										48 more bank slots for members
									</A>
								</td>
                                <td align=right>
									1-Aug-2005
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
								</tbody>
								</table></CENTER>
								</td>
								  </tbody>
							  </table>To view a full list of
                              news and updates, <A class=c href="news.html">Click
                              Here</A>. <BR><BR></CENTER>
							</td>
                            <td background="{{ asset('img/title/fm_right.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomleft.gif') }}" width=6>
							</td>
                            <td background="{{ asset('img/title/fm_bottom2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomright.gif') }}" width=6>
							</td>
						  </tr>
						  </tbody>
						</table>
					  </td>
					</tr>
					</tbody>
				  </table>
										</span>
											<div style="max-width: 770px">
												<table style="margin-top: 10px; max-width: 770px" cellSpacing=0
													   cellpadding=0 bgColor=black border=0>
													<tbody>
													<tr>
														<td>
															<img height=6 src="{{ asset('img/title/fm_topleft.gif') }}"
																 width=6>
														</td>
														<td background="{{ asset('img/title/fm_top2.gif') }}">
															<img height=6 src="{{ asset('img/title/blank.gif') }}"
																 width=1>
														</td>
														<td>
															<img height=6 src="{{ asset('img/title/fm_topright.gif') }}"
																 width=6>
														</td>
													</tr>
													<tr>
														<td background="{{ asset('img/title/fm_left.gif') }}">
															<img height=1 src="{{ asset('img/title/blank.gif') }}"
																 width=6>
														</td>
														<td>
															<CENTER><img height=7
																		 src="{{ asset('img/title/blank.gif') }}"
																		 width=505>
																<BR><B>Main Features</B> <BR><BR>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="detail.html">
									<img src="{{ asset('img/title/mm_sword.jpg') }}" border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110>
                                <tbody>
                                <tr>
                                <td class=b2 id=playgamebut background="{{ asset('img/title/shinystonered.jpg') }}"
									bgColor=#570700>
                                <CENTER><A class=whitelink onmouseover="redglow('playgamebut')"
										   onmouseout="unredglow('playgamebut')" href="detail.html">
										<B>Play Game</B>
										<BR>(Existing&nbsp;User)
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Play RuneScape right now!<BR>
									<A class=c href="detail.html">
										Click Here</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="create/index.html">
									<img src="{{ asset('img/title/mm_player.jpg') }}" border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b2 id=createaccountbut background="{{ asset('img/title/shinystonered.jpg') }}"
									bgColor=#570700>
                                <CENTER><A class=whitelink onmouseover="redglow('createaccountbut')"
										   onmouseout="unredglow('createaccountbut')" href="create/index.html">
										<B>Create&nbsp;Account</B><BR>
											(New User)
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Create a free account for both the game & website.
								<BR><A class=c href="create/index.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="screenshots/screenshots.html">
									<img src="{{ asset('img/title/mm2_screenshots.jpg') }}" border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=screenshotsbut background="{{ asset('img/stoneback.gif') }}"
									bgColor=#474747>
                                <CENTER><A class=whitelink onmouseover="greyglow('screenshotsbut')"
										   onmouseout="ungreyglow('screenshotsbut')"
										   href="screenshots/screenshots.html">
										<B>Screenshots</B>
									</A>
								</CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Lots of images of the game in action.
								<BR><A class=c href="screenshots/screenshots.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="members/members.html">
									<img src="{{ asset('img/title/mm_members.jpg') }}" border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=membersbut background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('membersbut')"
										   onmouseout="ungreyglow('membersbut')"
										   href="members/members.html">
										<B>Benefits for Members</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Find out what extras are available to members.<BR>
									<A class=c href="members/members.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="howtoplay.html">
									<img height=120 src="{{ asset('img/title/mm_howtoplay.jpg') }}" width=77 border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=manualbut background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('manualbut')"
										   onmouseout="ungreyglow('manualbut')"
										   href="howtoplay.html">
										<B>Manual</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Detailed info on all aspects of the game.
								<BR><A class=c href="howtoplay.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="hiscores/hiscores.html">
									<img src="{{ asset('img/title/mm_chalice.jpg') }}" border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=hiscoresbut background="{{ asset('img/stoneback.gif') }}"" bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('hiscoresbut')"
										   onmouseout="ungreyglow('hiscoresbut')"
										   href="hiscores/hiscores.html">
										<B>Full
											<BR>Hiscores</B>
									</A></CENTER>
									</td>
								</tr>
								</tbody>
							  </table>
								Is your character in the top 500,000?
								<BR><A class=c href="hiscores/hiscores.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="varrock/varrockindex.html">
									<img height=120 src="{{ asset('img/title/mm_lov.jpg') }}" width=77 border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=varrockbut background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink onmouseover="greyglow('varrockbut')"
										   onmouseout="ungreyglow('varrockbut')" href="varrock/varrockindex.html">
										<B>Library of Varrock</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Stories and letters about RuneScape.
								<BR><A class=c href="varrock/varrockindex.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td align=middle width=100>
								<A href="worldmap/worldmap.html">
									<img height=120 src="{{ asset('img/title/mm_worldmap.jpg') }}" width=77 border=0>
								</A>
							</td>
                            <td vAlign=top width=120>
                              <table height=45 cellpadding=2 width=110 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b id=worldmapbut background="{{ asset('img/stoneback.gif') }}"
									bgColor=#474747>
                                <CENTER><A class=whitelink onmouseover="greyglow('worldmapbut')"
										   onmouseout="ungreyglow('worldmapbut')" href="worldmap.html">
										<B>World Map</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
							  </table>
								Great for finding your way around.
								<BR><A class=c href="worldmap/worldmap.html">
										Click Here
									</A>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span>
																			<span class=item>
                        <table class=itemtable cellSpacing=0 cellpadding=0>
                          <tbody>
                          <tr>
                            <td width=100>
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=77>
							</td>
                            <td width=120>
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=110>
							</td>
						  </tr>
						  </tbody>
						</table>
																			</span></CENTER>
															<BR></td>
														<td background="{{ asset('img/title/fm_right.gif') }}">
															<img height=1 src="{{ asset('img/title/blank.gif') }}"
																 width=6>
														</td>
													</tr>
													<tr>
														<td>
															<img height=6
																 src="{{ asset('img/title/fm_bottomleft.gif') }}"
																 width=6>
														</td>
														<td background="{{ asset('img/title/fm_bottom2.gif') }}">
															<img height=6 src="{{ asset('img/title/blank.gif') }}"
																 width=1>
														</td>
														<td>
															<img height=6
																 src="{{ asset('img/title/fm_bottomright.gif') }}"
																 width=6>
														</td>
													</tr>
													</tbody>
												</table>
											</div>
											<span style="display: inline-block; margin: 0 7px 10px 0; width: 380px">
                  <table style="display: inline; width: 380px" cellSpacing=0 cellpadding=0>
                    <tbody>
                    <tr>
                      <td vAlign=top><BR>
                        <table cellSpacing=0 cellpadding=0 width=380 bgColor=black>
                          <tbody>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_topleft.gif') }}" width=6>
							</td>
                            <td background="{{ asset('img/title/fm_top2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_topright.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td background="{{ asset('img/title/fm_left.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
                            <td width=368>
								<img height=7 src="{{ asset('img/title/blank.gif') }}" width=1><BR>
                              <CENTER><B>Secure Services</B> <BR><BR>
                              <table cellSpacing=5 cellpadding=0>
                                <tbody>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Subscribe</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_subscribe.jpg') }}" width=48
											 border=0>
									</A>
								</td>
                                <td vAlign=top>
									Start a members subscription here.
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>&nbsp;</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Account Management</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_accman.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									Manage your Password and Recovery Details.
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Customer Support</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_support.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>Questions?
									<BR>Contact our staff.
										<BR><A class=c href="login.html">
												Login
											</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Message Centre</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_inbox.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									Your messages from our staff.
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Forums</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_forums.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>Discuss the game with fellow players!
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Personal Hiscores</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_chalice.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									How do you rank compared to your friends?
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="login.html">
										<B>Latest Poll</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="login.html">
										<img height=75 src="{{ asset('img/title/mms_vote.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									What do you enjoy most about Quests?
									<BR><A class=c href="login.html">
											Login
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td>
									&nbsp;
								</td>
								</tr>
								</tbody>
							  </table>
							  </CENTER>
							</td>
                            <td background="{{ asset('img/title/fm_right.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomleft.gif') }}" width=6>
							</td>
                            <td background="{{ asset('img/title/fm_bottom2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomright.gif') }}" width=6>
							</td>
						  </tr>
						  </tbody>
						</table>
					  </td>
					</tr>
					</tbody>
				  </table>
										</span>
											<span style="display: inline-block; margin: 0 0 10px; width: 380px">
                  <table style="display: inline; width: 380px" cellSpacing=0 cellpadding=0>
                    <tbody>
                    <tr>
                      <td vAlign=top><BR>
                        <table cellSpacing=0 cellpadding=0 width=380 bgColor=black>
                          <tbody>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_topleft.gif') }}" width=6>
							</td>
                            <td width="100%" background="{{ asset('img/title/fm_top2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_topright.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td background="{{ asset('img/title/fm_left.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
                            <td width=368>
                              <CENTER><img height=7 src="{{ asset('img/title/lank.gif') }}" width=1><BR>
										  <B>Other Features</B>
										  <BR><BR>
												  <!--table to contain options-->
                              <table cellSpacing=5 cellpadding=0>
                                <tbody>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">
										<B>Unsubscribe</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">
										<img height=75 src="{{ asset('img/title/mms_unsubscribe.jpg') }}" width=48
											 border=0>
									</A>
								</td>
                                <td>
									Cancel your subscription.
									<BR><A class=c
										   href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="https://password-web.runescape.com/aff/runescape/index.html">
										<B>Password Support</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="https://password-web.runescape.com/aff/runescape/index.html">
										<img height=75 src="{{ asset('img/title/mms_passwordsupport.jpg') }}" width=48
											 border=0>
									</A>
								</td>
                                <td>
									If you lose/forget your password help is at hand.
									<BR><A class=c href="https://password-web.runescape.com/aff/runescape/index.html">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="faq/faqindex.html">
										<B>F.A.Q.</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="faq/faqindex.html">
										<img height=75 src="{{ asset('img/title/mms_faq.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									Answers to Frequently Asked Questions.
									<BR><A class=c href="faq/faqindex.html">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="guides/guides.html">
										<B>Rules &amp; Security</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="guides/guides.html">
										<img height=75 src="{{ asset('img/title/mms_rules.jpg') }}" width=48 border=0>
									</A>
								</td>
                                <td>
									Learn our rules and stay safe online.
									<BR><A class=c href="guides/guides.html">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="files/files.html">
										<B>Extra Files</B>
									</A>
								</CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<A href="files/files.html">
										<img height=75 src="{{ asset('img/title/mms_extrafiles.jpg') }}" width=48
											 border=0>
									</A>
								</td>
                                <td>
									Download optional extras for RuneScape.
									<BR><A class=c href="files/files.html">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td class=b background="{{ asset('img/stoneback.gif') }}" bgColor=#474747>
                                <CENTER><A class=whitelink href="#">
										<B>RS-Classic</B>
									</A></CENTER>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td><A href="#">
										<img height=75 src="{{ asset('img/title/mms_rsclassic.jpg') }}" width=48
											 border=0>
									</A>
								</td>
                                <td>
									RuneScape Classic.
									<BR><A class=c href="#">
											Click Here
										</A>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
                                <tr>
                                <td vAlign=top align=middle width=160>
                                <table
									style="border-RIGHT: black 4px solid; border-top: black 4px solid; border-LEFT: black 4px solid; border-bottom: black 4px solid"
									cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td>
									<B>&nbsp;</B>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<img height=75 src="{{ asset('img/title/blank.gif') }}" width=48 border=0>
								</td>
                                <td style="COLOR: black"
								>What do you enjoy most about Quests?
                                <BR>&nbsp;
								</td>
								</tr>
								</tbody>
								</table>
								</td>
                                <td>
									&nbsp;
								</td>
                                <td vAlign=top align=middle width=160>
                                <table
									style="border-RIGHT: black 4px solid; border-top: black 4px solid; border-LEFT: black 4px solid; border-bottom: black 4px solid"
									cellpadding=2 width=160 bgColor=black>
                                <tbody>
                                <tr>
                                <td>
									<B>&nbsp;</B>
								</td>
								</tr>
								</tbody>
								</table>
                                <table>
                                <tbody>
                                <tr>
                                <td>
									<img height=75 src="{{ asset('img/title/blank.gif') }}" width=48 border=0>
								</td>
								</tr>
								</tbody>
								</table>
								</td>
								</tr>
								</tbody>
							  </table></CENTER>
							</td>
                            <td background="{{ asset('img/title/fm_right.gif') }}">
								<img height=1 src="{{ asset('img/title/blank.gif') }}" width=6>
							</td>
						  </tr>
                          <tr>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomleft.gif') }}" width=6>
							</td>
                            <td background="{{ asset('img/title/fm_bottom2.gif') }}">
								<img height=6 src="{{ asset('img/title/blank.gif') }}" width=1>
							</td>
                            <td>
								<img height=6 src="{{ asset('img/title/fm_bottomright.gif') }}" width=6>
							</td>
						  </tr>
						  </tbody>
						</table>
					  </td>
					</tr>
					</tbody>
				  </table>
				</span>
										</BR></CENTER>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			</tbody>
		</table>
	</div>

	<!-- Left column -->
	<!--<div class="text-info">
		<h4 class="pl-3 pr-3">Latest Achievements</h4>
		<div class="text-primary ml-3 mr-3" style="font-size: 13px;">
			@/foreach ($activityfeed as $activity)
				<div class="row clickable-row" data-href="../player/{/{ $activity->id }}">
					<div class="col-sm text-info font-weight-bold">
									<span
										class="small">{/{ Carbon\Carbon::parse($activity->time)->diffForHumans() }}</span>
					</div>
					<div class="col-9 pr-1 pl-1">
						@/if($activity->group_id != 10)
							<img class="mb-1" src="./img/{/{ $activity->group_id }}.svg" width="15"
								 height="15">
						@/endif
						<img class="pr-2 float-left" src="./img/avatars/{/{ $activity->id }}.png"
							 width="36" height="48">
						<span class="font-weight-bold">{/{ ucfirst($activity->username) }}</span>
						{/!! $activity->message !!}
					</div>
					<div class="border-top border-info mt-3"></div>
				</div>
			@/endforeach
		</div>


		</!-- Center column with title text --/>
		<div class="text-center">
			<div class="d-block pt-4">
				<img src="{/{ asset('img/logo.png') }}" class="img-fluid" alt="logo">
			</div>

			<div class="d-block pb-3">
				<div class="text-white-50">Striving for a replica RSC game and more</div>
			</div>

			<div class="d-block pt-1 pb-4">
				<div class="btn btn-md btn-secondary dropdown-toggle" data-toggle="dropdown"
					 aria-haspopup="true"
					 aria-expanded="false">
					Play Now
				</div>
				<div class="dropdown-menu bg-dark" style="padding: 0;">
					@/if ($agent->isAndroid())
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{/{ asset('downloads/openrsc.apk') }}">Android
							Version</a>
					@/elseif ($agent->isWindows())
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{/{ asset('OpenRSC.exe') }}">Windows Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{/{ asset('downloads/OpenRSC.jar') }}">Alternative
							Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
							Player Edition</a>
					@/else
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{/{ asset('downloads/OpenRSC.jar') }}">Game
							Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{/{ asset('downloads/openrsc.apk') }}">Android
							Version</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
							Player</a>
					@/endif
				</div>
			</div>

			<div class="">
				<div class="text-left text-primary">
					<br>
					<h4 class="text-info">Statistics</h4>
					<div>
						Players Online:
						<a href="{/{ route('online') }}">
                    <span class="text-info float-right">
                        {/{ $online }}
                    </span>
						</a>
					</div>
					<div>
						Server Status:
						<span class="float-right">
                    {/!! $status !!}
                </span>
					</div>
					<div>
						Players Created Today:
						<a href="{/{ route('createdtoday') }}">
                        <span class="text-info float-right">
                            {/{ $registrations }}
                        </span>
						</a>
					</div>
					<div>
						Online Last 48 Hours:
						<a href="{/{ route('logins48') }}">
                        <span class="text-info float-right">
                            {/{ $logins }}
                        </span>
						</a>
					</div>
					<div>
						Unique Players:
						<a href="{/{ route('stats') }}">
                        <span class="text-info float-right">
                            {/{ $uniquePlayers }}
                        </span>
						</a>
					</div>
					<div>
						Total Players:
						<a href="{/{ route('stats') }}">
                        <span class="text-info float-right">
                            {/{ $totalPlayers }}
                        </span>
						</a>
					</div>
					<div>
						Sum Gold:
						<a href="{/{ route('stats') }}">
                        <span class="text-info float-right">
							{/{ number_format($sumgold) }}
							<img class="mt-n2 ml-n2" src="{/{ asset('img/items/10.png') }}"
								 alt="coins" height="24px" width="32px"/>
                        </span>
						</a>
					</div>
					<div>
						Cumulative Play:
						<a href="{/{ route('stats') }}">
                        <span class="text-info float-right">
                            {/{ $totalTime }}
                        </span>
						</a>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>-->

@endsection
