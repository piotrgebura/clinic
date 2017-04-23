@extends('main')

@section('title', '- Edycja placówki')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		{!! Form::model($facility, ['route' => ['facilities.update', $facility->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
		<div class="col-md-8">
			<h1>Edycja placówki</h1>
			<hr />
			{!! Form::label('city', 'Miasto:') !!}
			{!! Form::text('city', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}
				
			{!! Form::label('address', 'Adres:') !!}
			{!! Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('facilities.show', 'Anuluj', ['id' => $facility->id], ['class' => 'btn btn-danger btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::submit('Zapisz', ['class' => 'btn btn-success btn-block']) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('javascripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection