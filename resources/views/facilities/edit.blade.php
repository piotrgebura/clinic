@extends('main')

@section('title', '- Edycja placówki')

@section('stylesheets')

@endsection

@section('content')

	<div class="row">
		{!! Form::model($facility, ['route' => ['facilities.update', $facility->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			<h1>Edycja placówki</h1>
			<hr />
			{!! Form::label('city', 'Miasto:') !!}
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
				
			{!! Form::label('address', 'Adres:') !!}
			{!! Form::text('address', null, ['class' => 'form-control']) !!}
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