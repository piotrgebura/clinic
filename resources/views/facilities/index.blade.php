@extends('main')

@section('title', '- Placówki')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Placówki</h1>
		</div>

		<div class="col-md-2">
			{{ Html::linkRoute('facilities.create', 'Dodaj placówkę', array(), ['class' => 'btn btn-lg btn-block btn-primary btn-default-top-spacing']) }}
		</div>

		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Miasto</th>
				<th>Adres</th>
				<th>Dodano</th>
				<th></th>
			</thead>
			
			<tbody>
				@foreach ($facilities as $facility)
					<tr>
						<th>{{ $facility->id }}</th>
						<td>{{ $facility->city }}</td>
						<td>{{ $facility->address }}</td>
						<td>{{ date('Y-m-d', strtotime($facility->created_at)) }}</td>
						<td>
							{!! Html::linkRoute('facilities.show', 'Podgląd', ['id' => $facility->id], ['class' => 'btn btn-default btn-sm']) !!}
							{!! Html::linkRoute('facilities.edit', 'Edytuj', ['id' => $facility->id], ['class' => 'btn btn-default btn-sm']) !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection