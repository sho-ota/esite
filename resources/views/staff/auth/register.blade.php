@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>eサイト</h1>
        <p>スタッフ登録</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            
            {!! Form::open(['route' => 'staff.register']) !!}
                <div class="form-group">
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => "姓"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => "名"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('last_name_hiragana', old('last_name_hiragana'), ['class' => 'form-control', 'placeholder' => "せい"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('first_name_hiragana', old('first_name_hiragana'), ['class' => 'form-control', 'placeholder' => "めい"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => "メール"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "パスワード"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => "パスワード（確認）"]) !!}
                </div>
                {!! Form::submit('登録', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
                
        </div>
    </div>
</div>
@endsection
