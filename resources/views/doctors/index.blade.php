@extends('main')

@section('title', '- Lekarze')

@section('content')

	<h1>Lekarze</h1>
	
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Tytuł</th>
			<th>Imię</th>
			<th>Nazwisko</th>
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
	
	<div class="text-center">
		{!! $doctors->links() !!}
	</div>

@endsection