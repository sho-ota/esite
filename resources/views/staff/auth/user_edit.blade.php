@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-5">
                <h4>{{ $user->last_name }} {{ $user->first_name }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="container">
 
{{-- エラーメッセージ --}}
    @include('commons.error.error_messages')
    
    <div class="row justify-content-center">
        <div class="col-md-5">
            
{{-- 利用者アカウント編集 --}}
            {!! Form::open(['route' => ['staff.users.update', $user->id] , 'method' => 'put']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => "姓"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => "名"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name_hiragana', $user->last_name_hiragana, ['class' => 'form-control', 'placeholder' => "せい"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name_hiragana', $user->first_name_hiragana, ['class' => 'form-control', 'placeholder' => "めい"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => "メール"]) !!}
                </div>
                {!! Form::submit('アカウント編集', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
            
            <div class="d-flex justify-content-between">
                {!! link_to_route('staff.users.destroy_show', 'アカウント削除ページへ移動する', [$user->id], ['class' => 'btn btn-link mt-2']) !!}
                {!! link_to_route('staff.users.index', '戻る', [], ['class' => 'btn btn-outline-info mt-2']) !!}
            </div>
            
        </div>
    </div>
</div>
@endsection


