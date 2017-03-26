@extends('main')

@section('title', '- Lekarze')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Lekarze</h1>
		</div>

		<div class="col-md-2">
			{{ Html::linkRoute('doctors.create', 'Dodaj lekarza', null, ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing']) }}
		</div>

		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Tytuł</th>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Specjalizacja</th>
				<th>Opis</th>
				<th>Dodano</th>
				<th></th>
			</thead>
			
			<tbody>
				@foreach ($doctors as $doctor)
					<tr>
						<th>{{ $doctor->id }}</th>
						<td>{{ $doctor->academic_title }}</td>
						<td>{{ $doctor->first_name }}</td>
						<td>{{ $doctor->last_name }}</td>
						<td>{{ $doctor->specialization ? $doctor->specialization->name : '' }}</td>
						<td>{{ substr($doctor->description, 0, 50) }}{{ strlen($doctor->description) > 50 ? "..." : "" }}</td>
						<td>{{ date('Y-m-d', strtotime($doctor->created_at)) }}</td>
						<td>
							{{ Html::linkRoute('doctors.show', 'Podgląd', ['id' => $doctor->id], ['class' => 'btn btn-default btn-sm']) }}
							{{ Html::linkRoute('doctors.edit', 'Edytuj', ['id' => $doctor->id], ['class' => 'btn btn-default btn-sm']) }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $doctors->links() !!}
			</div>
		</div>
	</div>

@endsection