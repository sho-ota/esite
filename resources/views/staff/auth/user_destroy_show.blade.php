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
            
            {{--利用者アカウント削除--}}    
            {!! Form::model($user, ['route' => ['staff.users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('アカウント削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
@endsection


