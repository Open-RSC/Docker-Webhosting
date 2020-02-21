@extends('template')

@section('content')

	<div class="justify-content-center row text-center">

		<div class="pt-4">

			<!-- Top row -->
			<div class="row">

				<!-- Logo and player online count -->
				<div class="col mr-1 mt-5">
					<img src="{{ asset('img/title/rslogo.png') }}" alt="logo">
					<div class="pt-3 d-block" style="font-size: 14px">
						{{ number_format($uniquePlayers) }} people have created {{ number_format($totalPlayers) }} players since 2018
					</div>
				</div>

				<!-- Latest news and updates box -->
				<div class="col">
					<table style="background-color: black">
						<tbody>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6" alt="">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
							<td>
								<div class="font-weight-bold pt-2 pb-2 d-block">
									Latest News and Updates
								</div>
								<table style="background-color: black">
									<tbody>
									<tr>
										<td class="pr-1 pl-1">
											<a href="news.html">
												<img src="{{ asset('img/title/mm_scroll.jpg') }}" alt="">
											</a>
										</td>
										<td style="width: 320px">
											<table height=130>
												<tbody>
												<tr>
													<td>
														<table style="width: 320px">
															<tbody>
															<tr>
																<td class="text-left">
																	<a class=c href="#">
																		Rogue trader
																	</a>
																</td>
																<td class="text-right pr-1">
																	15-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<a class=c href="#">
																		Tai Bwo Wannai Clean-Up
																	</a>
																</td>
																<td class="text-right pr-1">
																	9-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<a class=c href="#">
																		Behind The Scenes - August
																	</a>
																</td>
																<td class="text-right pr-1">
																	8-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<a class=c href="#">
																		New York Servers Online
																	</a>
																</td>
																<td class="text-right pr-1">
																	5-Aug-2005
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	<a class=c href="#">
																		48 more bank slots for members
																	</a>
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
									<a class=c href="news.html">
										Click Here
									</a>
								</div>
							</td>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" width="6" height="6" alt="">
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Main features box -->
			<div class="pt-3" style="max-width: 810px">
				<table style="background-color: black">
					<tbody>
					<tr style="line-height: 6px">
						<td>
							<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6" alt="">
						</td>
						<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
						</td>
						<td>
							<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6" alt="">
						</td>
					</tr>
					<tr>
						<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
						</td>
						<td>
							<div class="align-content-center col pb-3">
								<div class="font-weight-bold pt-2 pb-2 d-block">
										Main Features
								</div>

								<!-- Row 1/3 -->
								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<a href="{{ route('play') }}">
													<img src="{{ asset('img/title/mm_sword.jpg') }}" alt="play game">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="playgamebut"
															background="{{ asset('img/title/shinystonered.jpg') }}">
															<a class="whitelink" onmouseover="redglow('playgamebut')"
															   onmouseout="unredglow('playgamebut')" href="{{ route('play') }}">
															<span class="font-weight-bold d-block">
																Play Game
															</span>
																<span class="d-block">
																(Existing User)
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="font-weight-bold d-block">
												Play RuneScape Classic right now!
											</span>
												<span class="d-block">
													<a class=c href="{{ route('play') }}">
														<span class="d-block">
															Click Here
														</span>
													</a>
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
												<a href="create/index.html">
													<img src="{{ asset('img/title/mm_player.jpg') }}"
														 alt="create player">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="createaccountbut"
															background="{{ asset('img/title/shinystonered.jpg') }}">
															<a class="whitelink"
															   onmouseover="redglow('createaccountbut')"
															   onmouseout="unredglow('createaccountbut')"
															   href="create/index.html">
															<span class="font-weight-bold d-block">
																Create Account
															</span>
																<span class="d-block">
																(New User)
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
												Create a free account for both the game & website.
											</span>
												<a class="c" href="create/index.html">
												<span class="d-block">
													Click Here
												</span>
												</a>
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
												<a href="https://rsc.plus" target="_blank">
													<img src="{{ asset('img/title/mm2_screenshots.jpg') }}">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="screenshotsbut"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   onmouseover="greyglow('screenshotsbut')"
															   onmouseout="ungreyglow('screenshotsbut')"
															   href="https://rsc.plus" target="_blank">
															<span class="font-weight-bold d-block">
																RSC+ Replays
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
													Watch thousands of original RSC recordings!
												</span>
												<a class="c" href="https://rsc.plus" target="_blank">
													<span class="d-block">
														Click Here
													</span>
												</a>
											</td>
										</tr>
										</tbody>
									</table>
								</div>

								<!-- Row 2/3 -->
								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<a href="https://discord.gg/ABdFCqn">
													<img src="{{ asset('img/title/mm_members.jpg') }}" alt="">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="membersbut"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   onmouseover="greyglow('membersbut')"
															   onmouseout="ungreyglow('membersbut')"
															   href="https://discord.gg/ABdFCqn">
															<span class="font-weight-bold d-block">
																Discord Invitation
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
												Join our Discord server.
											</span>
												<a class=c href="https://discord.gg/ABdFCqn">
												<span class="d-block">
													Click Here
												</span>
												</a>
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
												<a href="/wiki">
													<img src="{{ asset('img/title/mm_howtoplay.jpg') }}"
														 alt="how to play">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="manualbut"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   onmouseover="greyglow('manualbut')"
															   onmouseout="ungreyglow('manualbut')"
															   target="_blank"
															   href="/wiki">
															<span class="font-weight-bold d-block">
																Manual
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
												Detailed info on all aspects of the game.
											</span>
												<a class="c" target="_blank" href="/wiki">
												<span class="d-block">
													Click Here
												</span>
												</a>
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
												<a href="hiscores/hiscores.html">
													<img src="{{ asset('img/title/mm_chalice.jpg') }}" alt="">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="hiscoresbut"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   onmouseover="greyglow('hiscoresbut')"
															   onmouseout="ungreyglow('hiscoresbut')"
															   href="hiscores/hiscores.html">
															<span class="font-weight-bold d-block">
																Full
															</span>
																<span class="font-weight-bold d-block">
																Hiscores
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
												Is your character in the top 500,000?
											</span>
												<a class="c" href="hiscores/hiscores.html">
												<span class="d-block">
													Click Here
												</span>
												</a>
											</td>
										</tr>
										</tbody>
									</table>
								</div>

								<!-- Row 3/3 -->
								<div class="item align-top">
									<table class="itemtable">
										<tbody>
										<tr>
											<td class="align-middle" style="width: 100px;">
												<a href="varrock/varrockindex.html">
													<img src="{{ asset('img/title/mm_lov.jpg') }}" alt="">
												</a>
											</td>
											<td class="align-top" style="width: 120px;">
												<table
													style="height: 45px; width: 110px; padding: 2px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center" id="varrockbut"
															background="{{ asset('img/stoneback.gif') }}" alt="">
															<a class="whitelink"
															   onmouseover="greyglow('varrockbut')"
															   onmouseout="ungreyglow('varrockbut')"
															   href="varrock/varrockindex.html">
															<span class="font-weight-bold d-block">
																Library of Varrock
															</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<span class="d-block">
												Stories and letters about RuneScape.
											</span>
												<a class="c" href="varrock/varrockindex.html">
												<span class="d-block">
													Click Here
												</span>
												</a>
											</td>
										</tr>
										</tbody>
									</table>
								</div>

								<table class="itemtable">
									<tbody>
									<tr>
										<td class="align-middle" style="width: 100px;">
											<a href="{{ route('worldmap') }}">
												<img src="{{ asset('img/title/mm_worldmap.jpg') }}" alt="">
											</a>
										</td>
										<td class="align-top" style="width: 120px;">
											<table
												style="height: 45px; width: 110px; padding: 2px; background-color: black">
												<tbody>
												<tr>
													<td class="b text-center" id="worldmapbut"
														background="{{ asset('img/stoneback.gif') }}">
														<a class="whitelink" onmouseover="greyglow('worldmapbut')"
														   onmouseout="ungreyglow('worldmapbut')"
														   href="{{ route('worldmap') }}">
														<span class="font-weight-bold d-block">
															World Map
														</span>
														</a>
													</td>
												</tr>
												</tbody>
											</table>
											<span class="d-block">
											Great for finding your way around.
										</span>
											<a class="c" href="{{ route('worldmap') }}">
											<span class="d-block">
												Click Here
											</span>
											</a>
										</td>
									</tr>
									</tbody>
								</table>

								<!-- Bottom border -->
								<div class="item">
									<table class="itemtable">
										<tbody>
										<tr>
											<td style="width: 100px">
												<img height=1 src="{{ asset('img/title/blank.gif') }}" width=77 alt="">
											</td>
											<td style="width: 120px">
												<img height=1 src="{{ asset('img/title/blank.gif') }}" width=110 alt="">
											</td>
										</tr>
										</tbody>
									</table>
								</div>
						</td>
						<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_right.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
						</td>
					</tr>
					<tr style="line-height: 6px">
						<td>
							<img src="{{ asset('img/title/fm_bottomleft.gif') }}" width="6" height="6" alt="">
						</td>
						<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
							<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
						</td>
						<td>
							<img src="{{ asset('img/title/fm_bottomright.gif') }}" width="6" height="6" alt="">
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
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6" alt="">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
							<td>
								<div class="align-content-center col pb-3">
									<div class="font-weight-bold pt-2 pb-2 d-block">
										Secure Services
									</div>
									<table>
										<tbody>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   href="#">
																<span class="font-weight-bold d-block">
																	Password Support
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="#">
																<img
																	src="{{ asset('img/title/mms_passwordsupport.jpg') }}"
																	alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																If you lose/forget your password help is at hand.
															</span>
															<a class="c" href="#">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
												<span class="ml-2 mr-2">
													<!-- Spreads the columns apart -->
												</span>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="login.html">
																<span class="d-block">
																	Account Management
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="login.html">
																<img src="{{ asset('img/title/mms_accman.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Manage your Password and Recovery Details.
															</span>
															<a class="c" href="login.html">
																<span class="d-block">
																	Login
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="guides/guides.html">
																<span class="d-block font-weight-bold">
																	Rules & Security
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="guides/guides.html">
																<img src="{{ asset('img/title/mms_rules.jpg') }}">
															</a>
														</td>
														<td>
															<span class="d-block">
																Learn our rules and stay safe online.
															</span>
															<a class="c" href="guides/guides.html">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="login.html">
																<span class="d-block">
																	Message Centre
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="login.html">
																<img src="{{ asset('img/title/mms_inbox.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Your messages from our staff.
															</span>
															<a class="c" href="login.html">
																<span class="d-block">
																	Login
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="login.html">
																<span class="d-block">
																	Latest Poll
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="login.html">
																<img src="{{ asset('img/title/mms_vote.jpg') }}" alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																What do you enjoy most about Quests?
															</span>
															<a class="c" href="login.html">
																<span class="d-block">
																	Login
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="login.html">
																<span class="d-block">
																	Personal Hiscores
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="login.html">
																<img src="{{ asset('img/title/mms_chalice.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																How do you rank compared to your friends?
															</span>
															<a class="c" href="login.html">
																<span class="d-block">
																	Login
																</span>
															</a>
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
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" width="6" height="6" alt="">
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
								<img src="{{ asset('img/title/fm_topleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_top2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_topright.gif') }}" width="6" height="6" alt="">
							</td>
						</tr>
						<tr>
							<td style="background-repeat: repeat-y; background-image: url({{ asset('img/title/fm_left.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
							<td>
								<div class="align-content-center col pb-3">
									<div class="font-weight-bold pt-2 pb-2 d-block">
										Other Features
									</div>
									<table>
										<tbody>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink"
															   href="https://classic.runescape.wiki/" target="_blank">
																<span class="d-block">
																	RSC Wiki
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="https://classic.runescape.wiki/" target="_blank">
																<img height=75
																	 src="{{ asset('img/title/mms_subscribe.jpg') }}"
																	 width=48 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Read all about Runescape Classic.
															</span>
															<a class="c" href="https://classic.runescape.wiki/" target="_blank">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
												<span class="ml-2 mr-2">
													<!-- Spreads the columns apart -->
												</span>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="https://discord.gg/grzEjDB" target="_blank">
																<span class="font-weight-bold d-block">
																	RSC Discord
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="https://discord.gg/grzEjDB" target="_blank">
																<img src="{{ asset('img/title/mms_forums.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Discuss the game with fellow players!
															</span>
															<a class="c" href="https://discord.gg/grzEjDB" target="_blank">
																<span class="d-block">
																	Login
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="https://reddit.com/r/openrsc" target="_blank">
																<span class="font-weight-bold d-block">
																	OpenRSC Reddit
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="https://reddit.com/r/openrsc" target="_blank">
																<img src="{{ asset('img/title/mms_unsubscribe.jpg') }}" alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Learn all about the project and recent development.
															</span>
															<a class="c" href="https://reddit.com/r/openrsc" target="_blank">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="https://reddit.com/r/rsc" target="_blank">
																<span class="d-block">
																	RSC Reddit
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="https://reddit.com/r/rsc" target="_blank">
																<img src="{{ asset('img/title/mms_support.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Discuss Runescape Classic topics.
															</span>
															<a class="c" href="https://reddit.com/r/rsc" target="_blank">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink" href="faq/faqindex.html">
																<span class="font-weight-bold d-block">
																	F.A.Q.
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="faq/faqindex.html">
																<img src="{{ asset('img/title/mms_faq.jpg') }}" alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Answers to Frequently Asked Questions.
															</span>
															<a class="c" href="faq/faqindex.html">
																<span class="d-block">
																	Click Here
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
											<td>
											</td>
											<td class="align-top" style="width: 160px">
												<table style="padding: 2px; width: 160px; background-color: black">
													<tbody>
													<tr>
														<td class="b text-center"
															background="{{ asset('img/stoneback.gif') }}">
															<a class="whitelink text-center" href="files/files.html">
																<span class="d-block">
																	Extra Files
																</span>
															</a>
														</td>
													</tr>
													</tbody>
												</table>
												<table>
													<tbody>
													<tr>
														<td>
															<a href="files/files.html">
																<img src="{{ asset('img/title/mms_extrafiles.jpg') }}"
																	 alt="">
															</a>
														</td>
														<td>
															<span class="d-block">
																Download optional extras for RuneScape.
															</span>
															<a class="c" href="files/files.html">
																<span class="d-block">
																	Click Here
																</span>
															</a>
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
								<img src="{{ asset('img/title/blank.gif') }}" width="6" height="1" alt="">
							</td>
						</tr>
						<tr style="line-height: 6px">
							<td>
								<img src="{{ asset('img/title/fm_bottomleft.gif') }}" width="6" height="6" alt="">
							</td>
							<td style="background-repeat: repeat-x; background-image: url({{ asset('img/title/fm_bottom2.gif') }})">
								<img src="{{ asset('img/title/blank.gif') }}" width="1" height="6" alt="">
							</td>
							<td>
								<img src="{{ asset('img/title/fm_bottomright.gif') }}" width="6" height="6" alt="">
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
						   href="https://game.openrsc.com/downloads/openrsc.apk">Android
							Version</a>
					@/else
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://game.openrsc.com/downloads/OpenRSC.jar">Game
							Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://game.openrsc.com/downloads/openrsc.apk">Android
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
