@extends('layouts.user.app')

@section('content')
    
    
    {{--
    <div class="container">
        <div class="text-center mb-5">
            <h1>{{ $user->id }} {{ $user->last_name }} {{ $user->first_name }}</h1>
        </div>
    </div>
    --}}
    
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('user.auth.nav_tabs')
                <div class="card ">
                    <div class="card-header text-center text-white bg-danger">{{ $attendance->what_day }}　{{ $user->last_name }} {{ $user->first_name }}　通所スタンプ</div>
    
                    <div class="card-body">
     {{--  動作確認--}}
                        <div class="">
                            <p>動作確認用</p>
                            
        <div>
            {{ $attendance }} 
        </div>
        </br>
        </br>
                            
                            {!! Form::model($attendance, ['route' => ['user.attendance.update', $attendance->id], 'method' => 'put']) !!}
                            
                                <div class="form-group">
                                    {!! Form::label('select', 'ステータス:') !!}
                                    {!! Form::select('select', ['0' => '選択してください', '1' => '通所する', '2' => '在宅ワーク', '3' => '施設外', '4' => '休む'], $attendance->select)!!}
                                    {{ $attendance->updated_at }}
                                </div>
                                {{--
                                <div class="form-group">
                                    {!! Form::label('comment', 'タスク:') !!}
                                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                                </div>
                                --}}
                            
                                {!! Form::submit('更新', ['class' => 'btn btn-info btn-block']) !!}
                            
                            {!! Form::close() !!}
                        </div>
                        
                        {{--{!! link_to_route('user.messages.index', "メッセージ", [$user->id], ['class' => 'btn btn-primary']) !!}--}}
    {{--  /動作確認--}}
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




{{--

{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}


--}}