@extends('layouts.user.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-light mb-2">
                    <div class="card-body">
                        <h5 class="mb-3">{{ $attendance->what_day }} {{ $week_list[$day_of_week] }}　{{ $user->last_name }} {{ $user->first_name }}　通所スタンプ</h5>
                        
                        {!! Form::model($attendance, ['route' => ['user.attendance.update', $attendance->id], 'method' => 'put']) !!}
                                {!! Form::select('select', $attendanceLists, $attendance->select)!!}
                                {{ $attendance->updated_at }}
                        {!! Form::submit('更新', ['class' => 'btn btn-info btn-block mt-3']) !!}
                        
                        {{-----------------------------------------------------------------------------------------------------------
                        @foreach ($attendanceLists as $key => $value)
                            {!! link_to_route('user.attendance.update', $key . $value, [$attendance->id], ['class' => 'btn btn-outline-info btn-block']) !!}</br>
                        @endforeach
                        -----------------------------------------------------------------------------------------------------------}}
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        {!! link_to_route('user.messages.index','メッセージルームid'.' '.$message_room->id, [$message_room->id], ['class' => 'btn btn-outline-info']) !!}
                    </div>
                </div>
{{--  動作確認--}}
<div>{{ $attendance }}</div>
{{--  /動作確認--}}
            </div>
        </div>
    </div>
@endsection

{{--
<div class="card bg-light mb-3">
    <div class="card-body">
        <h5>{{ $attendance->what_day }}　{{ $user->last_name }} {{ $user->first_name }}　通所スタンプ</h5>
        @foreach ($messages as $message)
        {!! Form::model($attendance, ['route' => ['user.attendance.update', $attendance->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('select', 'ステータス:') !!}
                {!! Form::select('select', ['0' => '選択してください', '1' => '通所する', '2' => '在宅ワーク', '3' => '施設外', '4' => '休む'], $attendance->select)!!}
                {{ $attendance->updated_at }}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
        @endforeach
    </div>
</div>
--}}