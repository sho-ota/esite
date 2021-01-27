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
        <div class="col-md-4">
            
            {!! Form::open(['route' => 'user.login']) !!}
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => "メール"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "パスワード"]) !!}
                </div>
                {!! Form::submit('ログイン', ['class' => 'btn btn-outline-info btn-block']) !!}
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
