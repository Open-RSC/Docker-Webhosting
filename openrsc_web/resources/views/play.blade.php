@extends('template')

@section('content')

	<div class="justify-content-center row text-center">

		<div class="pt-4">

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
															   onmouseout="unredglow('playgamebut')"
															   href="{{ route('play') }}">
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
		</div>
	</div>

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

	<!-- Extra large version -->
	<div class="row align-items-center d-none d-xl-block">
		<div class="col">

		</div>
	</div>

	<!-- Large version -->
	<div class="row align-items-center d-none d-md-none d-lg-block d-xl-none">
		<div class="col">

		</div>
	</div>

	<!-- Medium view version -->
	<div class="row align-items-center pl-5 pr-5 d-none d-md-block d-lg-none d-xl-none">
		<div class="col">

		</div>
	</div>

	<!-- Mobile view version -->
	<div class="row align-items-center pl-4 pr-4 d-sm d-md-none d-lg-none">
		<div class="col">
			discuss
		</div>
	</div>
@endsection
