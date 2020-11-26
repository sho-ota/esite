@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <h1>スタッフアカウント作成</h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {!! Form::open(['route' => 'staff.staffs.store']) !!}
                <div class="form-group">
                    {!! Form::label('last_name', '姓') !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('first_name', '名') !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('last_name_hiragana', 'せい') !!}
                    {!! Form::text('last_name_hiragana', old('last_name_hiragana'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('first_name_hiragana', 'めい') !!}
                    {!! Form::text('first_name_hiragana', old('first_name_hiragana'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('アカウント作成', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
                
        </div>
    </div>
</div>
@endsection
