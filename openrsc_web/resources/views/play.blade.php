@extends('templateborder')
@section('content')

	<img class="rsc-logo" src="{{ asset('images/title/rslogo.png') }}" alt="runescape logo">

	<div>
		<span class="h6 d-block">
			Please select a version to download
		</span>

		<div class="row justify-content-center">
			<div class="col-2 item">
				<table
					style="height: 45px; width: 110px;">
					<tbody>
					<tr>
						<td class="b text-center" id="playgamebut"
							background="{{ asset('images/title/shinystonered.jpg') }}">
							<a class="whitelink" onmouseover="redglow('playgamebut')"
							   onmouseout="unredglow('playgamebut')"
							   href="{{ $download_jar }}">
								<span class="font-weight-bold d-block">
									PC
								</span>
							</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>

			<div class="col-2">
				<!-- Column spacer -->
			</div>

			<div class="col-2 item">
				<table
					style="height: 45px; width: 110px;">
					<tbody>
					<tr>
						<td class="b text-center" id="createaccountbut"
							background="{{ asset('images/title/shinystonered.jpg') }}">
							<a class="whitelink"
							   onmouseover="redglow('createaccountbut')"
							   onmouseout="unredglow('createaccountbut')"
							   href="{{ $download_apk }}">
								<span class="font-weight-bold d-block">
									Android
								</span>
							</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<span class="d-block pt-5">
			Having trouble? Try the latest version of Java
		</span>
		<span class="d-block">
			<a href="{{ $download_jre }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-3">
			Android players: please install Gboard
		</span>
		<span class="d-block">
		<a href="https://play.google.com/store/apps/details?id=com.google.android.inputmethod.latin&hl=en_US">
			Click Here
		</a>
	</span>
	</div>

@endsection
