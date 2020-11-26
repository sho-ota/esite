@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <h1>eサイト</h1>
        <p>スタッフログイン</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {!! Form::open(['route' => 'staff.login']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
              
        </div>
    </div>
</div>
@endsection
