@extends('template')

@section('content')
	<div class="container">
		<h1>Contact Us</h1>

		<form action="{{ route('contact') }}" method="post">
			@csrf

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control bg-dark text-white-50 border-info"/>
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control bg-dark text-white-50 border-info"/>
			</div>

			<div class="form-group">
				<label>Subject</label>
				<input type="text" name="subject" class="form-control bg-dark text-white-50 border-info"/>
			</div>

			<div class="form-group">
				<label>Message</label>
				<textarea name="message" class="form-control bg-dark text-white-50 border-info" rows="5"></textarea>
			</div>

			<input type="submit" class="btn btn-primary" value="Send Email"/>
		</form>
	</div>
@endsection
