@extends('main')

@section('title', "- $specialization->name")

@section('content')

	<div class="row">
		<div class="col-md-12">
			
			<div class="jumbotron">
		    	<h1>{{ $specialization->name }}</h1>
		    	<p>{{ $specialization->description }}</p> 
		  	</div>
		
			<h2>Lekarze:</h2>
			@foreach ($specialization->doctors as $doctor)
				<div class="well">
					<h3>
						{{ Html::linkRoute('services.doctors.show', $doctor->academic_title.' '.$doctor->first_name.' '.$doctor->last_name, array('id' => $doctor->id), ['class' => 'doctor-link no-decoration']) }}
					</h3>
					<div>
						@foreach ($doctor->facilities as $facility)
							<h4 class="d-inline"><span class="label label-default">{{ $facility->city }} {{ $facility->address }}</span></h4>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection