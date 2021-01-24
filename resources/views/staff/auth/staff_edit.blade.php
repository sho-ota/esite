@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1>{{ $staff->last_name }} {{ $staff->first_name }}</h1>
    </div>
</div>
<div class="container">
    
{{-- エラーメッセージ --}}
    @include('commons.error.error_messages')
    
    <div class="row justify-content-center">
        <div class="col-md-7">
            
{{-- スタッフアカウント編集 --}}
            {!! Form::open(['route' => ['staff.staffs.update', $staff->id] , 'method' => 'put']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('last_name', '姓') !!}
                        {!! Form::text('last_name', $staff->last_name, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group col-md-6">
                        {!! Form::label('first_name', '名') !!}
                        {!! Form::text('first_name', $staff->first_name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('last_name_hiragana', 'せい') !!}
                        {!! Form::text('last_name_hiragana', $staff->last_name_hiragana, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group col-md-6">
                        {!! Form::label('first_name_hiragana', 'めい') !!}
                        {!! Form::text('first_name_hiragana', $staff->first_name_hiragana, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', $staff->email, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('アカウント編集', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
{{--スタッフアカウント削除--}}    
            {!! Form::model($staff, ['route' => ['staff.staffs.destroy', $staff->id], 'method' => 'delete']) !!}
                {!! Form::submit('アカウント削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
@endsection