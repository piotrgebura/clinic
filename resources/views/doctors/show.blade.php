@extends('main')

@section('title', "- Podgląd lekarza - $doctor->first_name $doctor->last_name")

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $doctor->academic_title }} {{ $doctor->first_name }} {{$doctor->last_name }}</h1>
			<h3><span class="label label-default">{{ $doctor->specialization ? $doctor->specialization->name : '' }}</span></h3>
			
			@if ($doctor->image)
				<img src="{{ asset("images/$doctor->image") }}" class="doctor-image pull-left" />
			@endif
		
			<div class="doctor-description">{!! $doctor->description !!}</div>

			@if ($doctor->facilities()->count())
				<div class="doctor-facilities">
					<h3>Placówki:</h3>
					@foreach ($doctor->facilities as $facility)
						<h4><span class="label label-primary">{{ $facility->city }} {{ $facility->address }}</span></h4>
					@endforeach
				</div>
			@endif
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('doctors.edit', 'Edytuj', ['id' => $doctor->id], ['class' => 'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['doctors.destroy', $doctor->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Usuń', ['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						@component('components.back_to_list_button')
							@slot('href')
								{{ route('doctors.index') }}
							@endslot
						@endcomponent
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection