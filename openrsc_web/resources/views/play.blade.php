@extends('template')

@section('content')

	<div class="justify-content-center row text-center">

		<div class="pt-4 pb-3">

			<table width=100% height=100% cellpadding=0 cellspacing=0>
				<tr>
					<td valign=middle>
						<center>
							<table cellpadding=0 cellspacing=0>
								<tr>
									<td valign=top><img src=images/edge_a.jpg width=100 height=43 hspace=0 vspace=0>
									</td>
									<td valign=top><img src=images/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
									</td>
									<td valign=top><img src=images/edge_d.jpg width=100 height=43 hspace=0 vspace=0>
									</td>
								</tr>
							</table>
							<table width=600 cellpadding=0 cellspacing=0 border=0 background=images/background2.jpg>
								<tr>
									<td valign=bottom>
										<center>
											<table width=250 bgcolor=black cellpadding=4>
												<tr>
													<td class=e>
														<center>
															<b>Play RuneScape</b>
															<br>
															<a class="c" href="title.html">Main Menu</a>
															-
															<a class="c"
															   href="detail.html">Detail
																Select</a>
														</center>
													</td>
												</tr>
											</table>
											<img src="images/cabbage_logo.png" height="300px" width="300px"/>
											<table cellpadding=0 cellspacing=0>
												<tr>
													<td valign=bottom>
														<img src=images/edge_g2.jpg width=100 height=82 hspace=0
															 vspace=0>
													</td>
													<td valign=bottom>
														<div align=center
															 style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
															This webpage and its contents is copyright 2005 Jagex
															Ltd<br>
															To use our service you must agree to our <a
																href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a>
															+ <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy
																policy</a>
														</div>
														<img src=images/edge_c.jpg width=400 height=42 hspace=0
															 vspace=0>
													</td>
													<td valign=bottom>
														<img src=images/edge_h2.jpg width=100 height=82 hspace=0
															 vspace=0>
													</td>
												</tr>
											</table>
										</center>
									</td>
								</tr>
							</table>
						</center>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<!-- Extra large version -->
	<div class="row align-items-center d-none d-xl-block">
		<div class="col">

		</div>
	</div>

	<!-- Large version -->
	<div
		class="row align-items-center d-none d-md-none d-lg-block d-xl-none">
		<div class="col">

		</div>
	</div>

	<!-- Medium view version -->
	<div
		class="row align-items-center pl-5 pr-5 d-none d-md-block d-lg-none d-xl-none">
		<div class="col">

		</div>
	</div>

	<!-- Mobile view version -->
	<div
		class="row align-items-center pl-4 pr-4 d-sm d-md-none d-lg-none">
		<div class="col">
			discuss
		</div>
	</div>
@endsection
