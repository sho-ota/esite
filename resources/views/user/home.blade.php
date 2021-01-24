@extends('layouts.user.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{----------------------------
                @include('user.auth.nav_tabs')
                ------------------------------}}
                <div class="card ">
                    <div class="card-header text-center text-white bg-danger">{{ $attendance->what_day }}　{{ $user->last_name }} {{ $user->first_name }}　通所スタンプ</div>
    
                    <div class="card-body">
{{--  動作確認--}}
                        <div class="">
                            <p>動作確認用</p>
                            
<div>
    {{ $attendance }}</br>
    -----------------------------------------------------------</br>
    {!! link_to_route('user.messages.index','メッセージルームid'.' '.$message_room->id, [$message_room->id], ['class' => 'btn btn-primary']) !!}</br>
    -----------------------------------------------------------</br>
    {{--{{ $user->user_messages()->get()}}</br>--}}
</div>
</br>
</br>
                            
                            {!! Form::model($attendance, ['route' => ['user.attendance.update', $attendance->id], 'method' => 'put']) !!}
                                <div class="form-group">
                                    {!! Form::label('select', 'ステータス:') !!}
                                    {!! Form::select('select', ['0' => '選択してください', '1' => '通所する', '2' => '在宅ワーク', '3' => '施設外', '4' => '休む'], $attendance->select)!!}
                                    {{ $attendance->updated_at }}
                                </div>
                                {!! Form::submit('更新', ['class' => 'btn btn-info btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
{{--  /動作確認--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection