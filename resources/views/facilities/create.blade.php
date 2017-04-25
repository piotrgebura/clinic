@extends('main')

@section('title', '- Dodaj placówkę')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Dodawanie nowej placówki</h1>
			<hr />

			{!! Form::open(['route' => 'facilities.store', 'files' => true, 'data-parsley-validate' => '']) !!}
				<div class="form-group">
					{!! Form::label('city', 'Miasto:') !!}
					{!! Form::text('city', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('address', 'Adres:') !!}
					{!! Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}
				</div>
				
				{!! Form::submit('Dodaj', ['class' => 'btn btn-success btn-lg btn-block']) !!}
			{!! Form::close() !!}
		</div>

	</div>

@endsection

@section('javascripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection