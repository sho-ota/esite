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
            
{{--スタッフアカウント削除--}}    
            {!! Form::model($staff, ['route' => ['staff.staffs.destroy', $staff->id], 'method' => 'delete']) !!}
                {!! Form::submit('アカウント削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
@endsection