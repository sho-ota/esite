@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-5">
                <h4>スタッフアカウント作成</h4>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            {!! Form::open(['route' => 'staff.staffs.store']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => "姓"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => "名"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name_hiragana', old('last_name_hiragana'), ['class' => 'form-control', 'placeholder' => "せい"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name_hiragana', old('first_name_hiragana'), ['class' => 'form-control', 'placeholder' => "めい"]) !!}
                    </div>
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
                {!! Form::submit('アカウント作成', ['class' => 'btn btn-info btn-block mt-3']) !!}
            {!! Form::close() !!}
            
            <div class="text-right">
                {!! link_to_route('staff.staffs.index', '戻る', [], ['class' => 'btn btn-outline-info mt-2']) !!}
            </div>
        </div>
    </div>
</div>
@endsection
