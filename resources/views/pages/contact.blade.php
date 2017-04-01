@extends('main')

@section('title', '- Kontakt')

@section('stylesheets')

	<script src='https://www.google.com/recaptcha/api.js'></script>

@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-12">
		    <h1>Formularz kontaktowy</h1>
		    <hr />
		    <form action="{{ url('contact') }}" method="POST">
		        {{ csrf_field() }}
		       
	            <label name="email">Email:</label>
	            <input id="email" name="email" class="form-control">

	      		<label name="subject">Tytuł:</label>
	            <input id="subject" name="subject" class="form-control">
	       
	            <label name="message">Treść:</label>
	            <textarea id="message" name="message" class="form-control"></textarea>

	            <div class="g-recaptcha btn-h1-spacing" data-sitekey="6LcwLxsUAAAAACMifOC841RhlpjhmSSXUyqGyjUe"></div>
		        
		        <input type="submit" value="Wyślij wiadomość" class="btn btn-success btn-lg btn-block btn-h1-spacing">
		    </form>
		</div>
	</div>

@endsection