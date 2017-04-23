@extends('main')

@section('title', '- Dodaj lekarza')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('top_javascripts')

	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=znjtut6mq3djgzgcsiu7tk54sn2tcp4dhpkaowuz4d2cc2y8"></script>
		
	<script>
		tinymce.init({
			selector: 'textarea'
		});
	</script>

@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Dodawanie nowego lekarza</h1>
			<hr />

			{!! Form::open(['route' => 'doctors.store', 'files' => true, 'data-parsley-validate' => '']) !!}
				{!! Form::label('academic_title', 'Tytuł:') !!}
				{!! Form::text('academic_title', null, ['class' => 'form-control', 'maxlength' => '64']) !!}
				
				{!! Form::label('first_name', 'Imię:') !!}
				{!! Form::text('first_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}
				
				{!! Form::label('last_name', 'Nazwisko:') !!}
				{!! Form::text('last_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '64']) !!}

				{!! Form::label('specialization_id', 'Specjalizacja') !!}
				<select name="specialization_id" class="form-control">
					<option selected></option>
					@foreach ($specializations as $specialization)
						<option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
					@endforeach
				</select>

				{!! Form::label('facilities', 'Placówki') !!}
				<select name="facilities[]" class="form-control select2-facilities" multiple="multiple">
					@foreach ($facilities as $facility)
						<option value="{{ $facility->id }}">{{ $facility->city }} {{ $facility->address }}</option>
					@endforeach
				</select>
				
				{!! Form::label('image', 'Zdjęcie') !!}
				{!! Form::file('image') !!}

				{!! Form::label('description', 'Opis:') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				
				{!! Form::submit('Dodaj', ['class' => 'btn btn-success btn-lg btn-block btn-default-top-spacing']) !!}
			{!! Form::close() !!}
		</div>

	</div>

@endsection

@section('javascripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script>
		$('.select2-facilities').select2();
	</script>

@endsection