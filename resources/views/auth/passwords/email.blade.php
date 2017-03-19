@extends('main')

@section('title', '- Zapomniałem hasła')

@section('content')
	
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Zresetuj hasło</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

			        {!! Form::open(['route' => 'password.email']) !!}		
						{{ Form::label('email', "Email:") }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
						
						<br />
						{{ Form::submit('Zresetuj hasło', ['class' => 'btn btn-primary']) }}
					{!! Form::close() !!}

                    
                </div>
            </div>
        </div>
    </div>

@endsection