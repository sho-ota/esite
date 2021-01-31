@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-5">
                <h4>{{ $staff->last_name }} {{ $staff->first_name }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
{{-- エラーメッセージ --}}
    @include('commons.error.error_messages')
    
    <div class="row justify-content-center">
        <div class="col-md-5">
            
{{-- スタッフアカウント編集 --}}
            {!! Form::open(['route' => ['staff.staffs.update', $staff->id] , 'method' => 'put']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name', $staff->last_name, ['class' => 'form-control', 'placeholder' => "姓"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name', $staff->first_name, ['class' => 'form-control', 'placeholder' => "名"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::text('last_name_hiragana', $staff->last_name_hiragana, ['class' => 'form-control', 'placeholder' => "せい"]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::text('first_name_hiragana', $staff->first_name_hiragana, ['class' => 'form-control', 'placeholder' => "めい"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::email('email', $staff->email, ['class' => 'form-control', 'placeholder' => "メール"]) !!}
                </div>
                {!! Form::submit('アカウント編集', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
            
            <div class="d-flex justify-content-between">
                {!! link_to_route('staff.staffs.destroy_show', 'アカウント削除ページへ移動する', [$staff->id], ['class' => 'btn btn-link mt-2']) !!}
                {!! link_to_route('staff.staffs.index', '戻る', [], ['class' => 'btn btn-outline-info mt-2']) !!}
            </div>
            
        </div>
    </div>
</div>
@endsection