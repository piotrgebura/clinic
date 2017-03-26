@extends('main')

@section('title', '- Edycja specjalizacji')

@section('content')

	<div class="row">
		{!! Form::model($specialization, ['route' => ['specializations.update', $specialization->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			<h1>Edycja specjalizacji</h1>
			<hr />
			{{ Form::label('name', 'Nazwa:') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						{{ Html::linkRoute('specializations.show', 'Anuluj', ['id' => $specialization->id], ['class' => 'btn btn-danger btn-block']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Zapisz', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection