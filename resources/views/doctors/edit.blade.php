@extends('main')

@section('title', '- Edycja lekarza')

@section('content')

	<div class="row">
		{!! Form::model($doctor, ['route' => ['doctors.update', $doctor->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			<h1>Edycja lekarza</h1>
			<hr />
			{{ Form::label('academic_title', 'Tytuł:') }}
			{{ Form::text('academic_title', null, ['class' => 'form-control']) }}
				
			{{ Form::label('first_name', 'Imię:') }}
			{{ Form::text('first_name', null, ['class' => 'form-control']) }}
				
			{{ Form::label('last_name', 'Nazwisko:') }}
			{{ Form::text('last_name', null, ['class' => 'form-control']) }}

			{{ Form::label('specialization_id', 'Specjalizacja') }}
			{{ Form::select('specialization_id', $specializations, null, ['class' => 'form-control']) }}
				
			{{ Form::label('description', 'Opis:') }}
			{{ Form::textarea('description', null, ['class' => 'form-control']) }}
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						{{ Html::linkRoute('doctors.show', 'Anuluj', ['id' => $doctor->id], ['class' => 'btn btn-danger btn-block']) }}
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