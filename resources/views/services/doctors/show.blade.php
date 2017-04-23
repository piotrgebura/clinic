@extends('main')

@section('title', "- $doctor->first_name $doctor->last_name")

@section('content')
	
	<div class="row">
		<div class="col-md-12">
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
	</div>

@endsection