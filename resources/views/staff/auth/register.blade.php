@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <h1>スタッフ登録</h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {!! Form::open(['route' => 'staff.register']) !!}
                <div class="form-group">
                    {!! Form::label('last_name', 'Last_name') !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('first_name', 'First_name') !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('last_name_hiragana', 'Last_name_hiragana') !!}
                    {!! Form::text('last_name_hiragana', old('last_name_hiragana'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('first_name_hiragana', 'First_name_hiragana') !!}
                    {!! Form::text('first_name_hiragana', old('first_name_hiragana'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
                
        </div>
    </div>
</div>
@endsection
