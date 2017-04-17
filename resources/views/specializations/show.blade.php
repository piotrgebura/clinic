@extends('main')

@section('title', "- $specialization->name")

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $specialization->name }} <small>{{ $specialization->doctors()->count() }} lekarz(y)</small> </h1>
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Tytuł</th>
					<th>Imię</th>
					<th>Nazwisko</th>
					<th></th>
				</thead>
				
				<tbody>
					@foreach ($specialization->doctors as $doctor)
						<tr>
							<th>{{ $doctor->id }}</th>
							<td>{{ $doctor->academic_title }}</td>
							<td>{{ $doctor->first_name }}</td>
							<td>{{ $doctor->last_name }}</td>
							<td>
								{!! Html::linkRoute('doctors.show', 'Podgląd', ['id' => $doctor->id], ['class' => 'btn btn-default btn-xs']) !!}
								{!! Html::linkRoute('doctors.edit', 'Edytuj', ['id' => $doctor->id], ['class' => 'btn btn-default btn-xs']) !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('specializations.edit', 'Edytuj', ['id' => $specialization->id], ['class' => 'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['specializations.destroy', $specialization->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Usuń', ['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						@component('components.back_to_list_button')
							@slot('href')
								{{ route('specializations.index') }}
							@endslot
						@endcomponent
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection