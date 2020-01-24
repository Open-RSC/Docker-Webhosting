@extends('template')

@section('content')

	<div class="justify-content-center row text-center">

		<div class="text-center d-block pt-4">

			<!-- Top row -->
			<div class="row">

				<!-- Logo and player online count -->
				<div class="col mr-1 mt-5">
					<img src="{{ asset('img/title/rslogo.gif') }}" alt="logo">
					<div class="pt-3" style="font-size: 14px">
						There are currently {{ $online }} people playing!
					</div>
				</div>

				<!-- Latest news and updates box -->
				<div class="col">
					<table style="background-color: black">
						<tbody>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
							<td>
								<div class="font-weight-bold pt-2">
									Latest News and Updates
								</div>
								<table style="background-color: black">
									<tbody>
									<tr>
										<td class="pr-1 pl-1">
											<A href="news.html">
												<img src="{{ asset('img/title/mm_scroll.jpg') }}">
											</A>
										</td>
										<td width=320>
											<table height=130>
												<tbody>
												<tr>
													<td>
														<table width=320>
															<tbody>
															<tr>
																<td class="text-left">
																	<A class=c
																	   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=468">
																		Rogue trader
																	</A>
																</td>
																<td class="text-right pr-1">
																	15-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<A class=c
																	   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=466">
																		Tai Bwo Wannai Clean-Up
																	</A>
																</td>
																<td class="text-right pr-1">
																	9-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<A class=c
																	   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=465">
																		Behind The Scenes - August
																	</A>
																</td>
																<td class="text-right pr-1">
																	8-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<A class=c
																	   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=464">
																		New York Servers Online
																	</A>
																</td>
																<td class="text-right pr-1">
																	5-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<A class=c
																	   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=462">
																		48 more bank slots for members
																	</A>
																</td>
																<td class="text-right pr-1">
																	1-Aug-2005
																</td>
															</tr>
															</tbody>
														</table>
													</td>
												</tr>
												</tbody>
											</table>
										</td>
									</tbody>
								</table>
								<div class="pb-2">
									To view a full list of news and updates,
									<A class=c href="news.html">Click Here</A>.
								</div>
							</td>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" alt="left" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" alt="right" width="6" height="6">
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Main features box -->
			<div class="pt-3" style="max-width: 797px">
				<table style="background-color: black">
					<tbody>
					<tr style="line-height: 6px">
						<td>
							<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6">
						</td>
						<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
						</td>
						<td>
							<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6">
						</td>
					</tr>
					<tr>
						<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
						</td>
						<td>
							<div class="font-weight-bold pt-2">
								<span class="font-weight-bold">Main Features</span>
							</div>

							<!-- Row 1/3 -->
							<div clas="row">
								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<A href="detail.html">
													<img src="{{ asset('img/title/mm_sword.jpg') }}" border=0>
												</A>
											</td>
											<td vAlign=top width=120>
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id=playgamebut
															background="{{ asset('img/title/shinystonered.jpg') }}"
															bgColor=#570700>
															<A class="whitelink" onmouseover="redglow('playgamebut')"
															   onmouseout="unredglow('playgamebut')" href="detail.html">
									<span class="font-weight-bold">
										Play Game
									</span>
																<span class="d-block">
										(Existing User)
									</span>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="font-weight-bold">
									Play RuneScape Classic right now!
								</span>
												<span class="d-block">
									<A class=c href="detail.html">
										Click Here
									</A>
								</span>
											</td>
										</tr>
										</tbody>
									</table>
								</div>

								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<A href="create/index.html">
													<img src="{{ asset('img/title/mm_player.jpg') }}" border=0>
												</A>
											</td>
											<td vAlign=top width=120>
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" 2 id=createaccountbut
															background="{{ asset('img/title/shinystonered.jpg') }}"
															bgColor=#570700>
															<A class="whitelink"
															   onmouseover="redglow('createaccountbut')"
															   onmouseout="unredglow('createaccountbut')"
															   href="create/index.html">
																<B>Create Account</B><BR>
																	(New User)
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												Create a free account for both the game & website.
												<A class="c d-block" href="create/index.html">
													Click Here
												</A>
											</td>
										</tr>
										</tbody>
									</table>
								</div>

								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<A href="screenshots/screenshots.html">
													<img src="{{ asset('img/title/mm2_screenshots.jpg') }}" border=0>
												</A>
											</td>
											<td vAlign=top width=120>
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id=screenshotsbut
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink"
															   onmouseover="greyglow('screenshotsbut')"
															   onmouseout="ungreyglow('screenshotsbut')"
															   href="screenshots/screenshots.html">
																<B>Screenshots</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												Lots of images of the game in action.
												<A class="c d-block" href="screenshots/screenshots.html">
													Click Here
												</A>
											</td>
										</tr>
										</tbody>
									</table>
								</div>


								<!-- Row 2/3 -->
								<div class="row">
									<div class="item align-top">
										<table class="itemtable">
											<tbody>
											<tr>
												<td class="align-middle" style="width: 100px;">
													<A href="members/members.html">
														<img src="{{ asset('img/title/mm_members.jpg') }}" border=0>
													</A>
												</td>
												<td vAlign=top width=120>
													<table
														style="height: 45px; width: 110px; padding: 2px; background-color: black">
														<tbody>
														<tr>
															<td class="b text-center" id=membersbut
																background="{{ asset('img/stoneback.gif') }}"
																bgColor=#474747>
																<A class="whitelink"
																   onmouseover="greyglow('membersbut')"
																   onmouseout="ungreyglow('membersbut')"
																   href="members/members.html">
									<span class="font-weight-bold">
										Benefits for Members
									</span>
																</A>
															</td>
														</tr>
														</tbody>
													</table>
													<span class="d-block">
								Find out what extras are available to members.
								</span>
													<A class=c href="members/members.html">
														Click Here
													</A>
												</td>
											</tr>
											</tbody>
										</table>
									</div>

									<div class="item align-top">
										<table class="itemtable">
											<tbody>
											<tr>
												<td class="align-middle" style="width: 100px;">
													<A href="howtoplay.html">
														<img height=120 src="{{ asset('img/title/mm_howtoplay.jpg') }}"
															 width=77 border=0 alt="how to play">
													</A>
												</td>
												<td vAlign=top width=120>
													<table
														style="height: 45px; width: 110px; padding: 2px; background-color: black">
														<tbody>
														<tr>
															<td class="b text-center" id=manualbut
																background="{{ asset('img/stoneback.gif') }}"
																bgColor=#474747>
																<A class="whitelink"
																   onmouseover="greyglow('manualbut')"
																   onmouseout="ungreyglow('manualbut')"
																   href="howtoplay.html">
																	<span class="font-weight-bold">
																		Manual
																	</span>
																</A>
															</td>
														</tr>
														</tbody>
													</table>
													Detailed info on all aspects of the game.
													<A class="c d-block" href="howtoplay.html">
														<span class="d-block">
															Click Here
														</span>
													</A>
												</td>
											</tr>
											</tbody>
										</table>
									</div>

									<div class="item align-top">
										<table class="itemtable">
											<tbody>
											<tr>
												<td class="align-middle" style="width: 100px;">
													<A href="hiscores/hiscores.html">
														<img src="{{ asset('img/title/mm_chalice.jpg') }}">
													</A>
												</td>
												<td vAlign=top width=120>
													<table
														style="height: 45px; width: 110px; padding: 2px; background-color: black">
														<tbody>
														<tr>
															<td class="b text-center" id="hiscoresbut"
																background="{{ asset('img/stoneback.gif') }}"
																bgColor=#474747>
																<A class="whitelink"
																   onmouseover="greyglow('hiscoresbut')"
																   onmouseout="ungreyglow('hiscoresbut')"
																   href="hiscores/hiscores.html">
																	<span class="font-weight-bold d-block">
																		Full
																	</span>
																	<span class="font-weight-bold">
																		Hiscores
																	</span>
																</A>
															</td>
														</tr>
														</tbody>
													</table>
													<span class="d-block">
														Is your character in the top 500,000?
													</span>
													<A class="c d-block" href="hiscores/hiscores.html">
														<span class="d-block">
															Click Here
														</span>
													</A>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>

								<!-- Row 3/3 -->
								<div class="row">
									<div class="item align-top">
										<table class="itemtable">
											<tbody>
											<tr>
												<td class="align-middle" style="width: 100px;">
													<A href="varrock/varrockindex.html">
														<img height=120 src="{{ asset('img/title/mm_lov.jpg') }}"
															 width=77 border=0>
													</A>
												</td>
												<td vAlign=top width=120>
													<table
														style="height: 45px; width: 110px; padding: 2px; background-color: black">
														<tbody>
														<tr>
															<td class="b text-center" id=varrockbut
																background="{{ asset('img/stoneback.gif') }}"
																bgColor=#474747>
																<A class="whitelink"
																   onmouseover="greyglow('varrockbut')"
																   onmouseout="ungreyglow('varrockbut')"
																   href="varrock/varrockindex.html">
																	<span class="font-weight-bold">
																		Library of Varrock
																	</span>
																</A>
															</td>
														</tr>
														</tbody>
													</table>
													Stories and letters about RuneScape.
													<A class="c d-block" href="varrock/varrockindex.html">
														<span class="d-block">
															Click Here
														</span>
													</A>
												</td>
											</tr>
											</tbody>
										</table>
									</div>

									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<A href="worldmap/worldmap.html">
													<img height=120 src="{{ asset('img/title/mm_worldmap.jpg') }}"
														 width=77 border=0>
												</A>
											</td>
											<td vAlign=top width=120>
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id=worldmapbut
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" onmouseover="greyglow('worldmapbut')"
															   onmouseout="ungreyglow('worldmapbut')"
															   href="worldmap.html">
																<span class="font-weight-bold">World Map</span>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												Great for finding your way around.
												<A class="c d-block" href="worldmap/worldmap.html">
													<span class="d-block">
														Click Here
													</span>
												</A>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>

							<!-- Bottom border -->
							<span class="item">
								<table class="itemtable">
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
							</span>
						</td>
						<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
						</td>
					</tr>
					<tr style="line-height: 6px">
						<td>
							<img src="{{ asset('img/title/fm_bottomleft.gif') }}" alt="left" width="6" height="6">
						</td>
						<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
						</td>
						<td>
							<img src="{{ asset('img/title/fm_bottomright.gif') }}" alt="right" width="6" height="6">
						</td>
					</tr>
					</tbody>
				</table>
			</div>

			<!-- Bottom row -->
			<div class="row mt-3 mb-3">

				<!-- Secure Services box -->
				<div class="col">
					<table style="background-color: black">
						<tbody>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
							<td>
								<div class="align-content-center col pb-3">
									<div class="font-weight-bold pt-2 pb-2">
										Secure Services
									</div>
									<table cellSpacing=5 cellpadding=0>
										<tbody>
										<tr>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Subscribe</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_subscribe.jpg') }}"
																	 width=48
																	 border=0>
															</A>
														</td>
														<td vAlign=top>
															Start a members subscription here.
															<A class="c d-block" href="login.html">
																Login
															</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
												<span class="ml-2 mr-2"></span> <!-- Spreads the columns apart -->
											</td>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Account Management</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_accman.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>
															Manage your Password and Recovery Details.
															<A class="c d-block" href="login.html">
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
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Customer Support</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_support.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>Questions?
															<BR>Contact our staff.
																<A class="c d-block" href="login.html">
																	Login
																</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Message Centre</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_inbox.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>
															Your messages from our staff.
															<A class="c d-block" href="login.html">
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
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Forums</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_forums.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>Discuss the game with fellow players!
															<A class="c d-block" href="login.html">
																Login
															</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Personal Hiscores</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_chalice.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>
															How do you rank compared to your friends?
															<A class="c d-block" href="login.html">
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
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="login.html">
																<B>Latest Poll</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="login.html">
																<img height=75
																	 src="{{ asset('img/title/mms_vote.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>
															What do you enjoy most about Quests?
															<A class="c d-block" href="login.html">
																Login
															</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</td>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" alt="left" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" alt="right" width="6" height="6">
							</td>
						</tr>
						</tbody>
					</table>
				</div>

				<!-- Other Features box -->
				<div class="col">
					<table style="background-color: black">
						<tbody>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
							<td>
								<div class="align-content-center col pb-4">
									<div class="font-weight-bold mt-2 mb-2 pt-2">
										Other Features
									</div>
									<!--table to contain options-->
									<table cellSpacing=5 cellpadding=0>
										<tbody>
										<tr>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink"
															   href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">
																<B>Unsubscribe</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">
																<img height=75
																	 src="{{ asset('img/title/mms_unsubscribe.jpg') }}"
																	 width=48
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
												<span class="ml-2 mr-2"></span> <!-- Spreads the columns apart -->
											</td>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink"
															   href="https://password-web.runescape.com/aff/runescape/index.html">
																<B>Password Support</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="https://password-web.runescape.com/aff/runescape/index.html">
																<img height=75
																	 src="{{ asset('img/title/mms_passwordsupport.jpg') }}"
																	 width=48
																	 border=0>
															</A>
														</td>
														<td>
															If you lose/forget your password help is at hand.
															<A class="c d-block"
															   href="https://password-web.runescape.com/aff/runescape/index.html">
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
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="faq/faqindex.html">
																<B>F.A.Q.</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="faq/faqindex.html">
																<img height=75
																	 src="{{ asset('img/title/mms_faq.jpg') }}" width=48
																	 border=0>
															</A>
														</td>
														<td>
															Answers to Frequently Asked Questions.
															<A class="c d-block" href="faq/faqindex.html">
																Click Here
															</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td vAlign=top align=middle width=160>
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink" href="guides/guides.html">
																<B>Rules &amp; Security</B>
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="guides/guides.html">
																<img height=75
																	 src="{{ asset('img/title/mms_rules.jpg') }}"
																	 width=48 border=0>
															</A>
														</td>
														<td>
															Learn our rules and stay safe online.
															<A class="c d-block" href="guides/guides.html">
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
												<table cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}"
															bgColor=#474747>
															<A class="whitelink text-center" href="files/files.html">
																Extra Files
															</A>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<A href="files/files.html">
																<img height=75
																	 src="{{ asset('img/title/mms_extrafiles.jpg') }}"
																	 width=48
																	 border=0>
															</A>
														</td>
														<td>
															Download optional extras for RuneScape.
															<A class="c d-block" href="files/files.html">
																Click Here
															</A>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td vAlign=top align=middle width=160>
											</td>
										</tr>
										<tr>
											<td vAlign=top align=middle width=160>
												<table
													style="border-right: black 4px solid; border-top: black 4px solid; border-left: black 4px solid; border-bottom: black 4px solid"
													cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<img height=75 src="{{ asset('img/title/blank.gif') }}"
																 width=48 border=0>
														</td>
														<td style="COLOR: black"
														>What do you enjoy most about Quests?
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td vAlign=top align=middle width=160>
												<table
													style="border-right: black 4px solid; border-top: black 4px solid; border-left: black 4px solid; border-bottom: black 4px solid"
													cellpadding=2 width=160 style="background-color: black">
													<tbody>
													<tr>
														<td>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<img height=75 src="{{ asset('img/title/blank.gif') }}"
																 width=48 border=0>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</td>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" alt="left" width="6" height="6">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" alt="right" width="6" height="6">
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- left column -->
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
