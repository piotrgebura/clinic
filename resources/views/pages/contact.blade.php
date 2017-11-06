@extends('main')

@section('title', '- Kontakt')

@section('top_javascripts')

	<script src='https://www.google.com/recaptcha/api.js'></script>

@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-12">
		    <h1>Formularz kontaktowy</h1>
		    <hr />
		    <form action="{{ url('contact') }}" method="POST">
		        {!! csrf_field() !!}
		       
	            <div class="form-group">
		            @if (Auth::guard('web')->check())
		            	<input type="hidden" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
		            @else	           		
	           			<label name="email">Email:</label>
	            		<input type="email" id="email" name="email" class="form-control">         	
		            @endif
	            </div>

	      		<div class="form-group">
	      			<label name="subject">Tytuł:</label>
	           	 <input type="text" id="subject" name="subject" class="form-control">
	            </div>
	       
	            <div class="form-group">
		            <label name="message">Treść:</label>
		            <textarea id="message" name="message" class="form-control"></textarea>
	            </div>

	            <div class="g-recaptcha btn-h1-spacing" data-sitekey="{{ config('google.captcha.site_key') }}"></div>
		        
		        <input type="submit" value="Wyślij wiadomość" class="btn btn-success btn-lg btn-block btn-default-top-spacing">
		    </form>
		</div>
	</div>

@endsection