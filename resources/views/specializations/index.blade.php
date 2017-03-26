@extends('main')

@section('title', '- Specjalizacje')

@section('content')

	<div class="row">
		<div class="col-md-7">
			<h1>Specjalizacje</h1>
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Nazwa</th>
					<th></th>
				</thead>
				
				<tbody>
					@foreach ($specializations as $specialization)
						<tr>
							<th>{{ $specialization->id }}</th>
							<td>{{ $specialization->name }}</td>
							<td>
								{{ Html::linkRoute('specializations.show', 'Podgląd', ['id' => $specialization->id], ['class' => 'btn btn-default btn-sm']) }}
								{{ Html::linkRoute('specializations.edit', 'Edytuj', ['id' => $specialization->id], ['class' => 'btn btn-default btn-sm']) }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		</div>

		<div class="col-md-4">
			<div class="well">
				<h2>Nowa specjalizacja</h2>			
				{!! Form::open(['route' => ['specializations.store'], 'method' => 'POST']) !!}
					{{ Form::label('name', 'Nazwa:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Dodaj nową specjalizację', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				{!! Form::close() !!}
			</div>
		</div>

	</div>
@endsection