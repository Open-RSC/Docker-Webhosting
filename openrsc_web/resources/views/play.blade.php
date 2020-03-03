@extends('template')

@section('content')

	<div class="justify-content-center row text-center">

		<div class="pt-4 pb-3">
			<table class="table-responsive">
				<tr>
					<td class="align-middle">
						<table cellpadding="0">
							<tr>
								<td class="align-top">
									<img src="{{ asset('images/edge_a.jpg') }}" alt="edge">
								</td>
								<td class="align-top">
									<img src="{{ asset('images/edge_c.jpg') }}" alt="edge">
								</td>
								<td class="align-top">
									<img src="{{ asset('images/edge_d.jpg') }}" alt="edge">
								</td>
							</tr>
						</table>
						<table class="mx-auto" style="background-image: url({{ asset('images/background2.jpg') }});" cellpadding="0">
							<tr>
								<td>
									<table class="mx-auto" style="width: 250px; background-color: black" cellpadding=4>
										<tr>
											<td class="e">
												<span class="d-block font_weight_bold">
													Play RuneScape
												</span>
												<span class="d-block">
													<a class="c" href="{{ asset('home') }}">
														Main Menu
													</a>
													-
													<a class="c" href="detail.html">
														Detail Select
													</a>
												</span>
											</td>
										</tr>
									</table>
									<!-- Begin content -->

									<img src="{{ asset('images/cabbage_logo.png') }}" height="300px" width="300px"
										 alt="alt">

									<!-- End content -->
									<table class="mx-auto" cellpadding=0>
										<tr>
											<td class="align-bottom">
												<img src="{{ asset('images/edge_g2.jpg') }}" alt="edge">
											</td>
											<td class="align-bottom">
												<img src="{{ asset('images/edge_c.jpg') }}" alt="edge">
											</td>
											<td class="align-bottom">
												<img src="{{ asset('images/edge_h2.jpg') }}" alt="edge">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
@endsection
