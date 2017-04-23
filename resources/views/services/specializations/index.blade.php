@extends('main')

@section('title', '- Usługi')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>Usługi</h1>
		</div>

		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		@foreach ($specializations as $specialization)
			<div class="col-md-4">
			{{ Html::linkRoute('services.specializations.show', $specialization->name, array('id' => $specialization->id), ['class' => 'btn btn-block btn-lg btn-primary btn-default-top-spacing']) }}
			</div>
		@endforeach
	</div>
	

@endsection