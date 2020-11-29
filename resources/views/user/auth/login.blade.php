@extends('layouts.user.app')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>eサイト</h1>
        <p>メンバーログイン</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            {!! Form::open(['route' => 'user.login']) !!}
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
