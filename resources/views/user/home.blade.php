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
    {{-- ボタンレイアウト確認
                        <input class="btn btn-light col-md-12 mb-3" type="button" value="通所">1</br>
                        <input class="btn btn-light col-md-12 mb-3" type="button" value="在宅">2</br>
                        <input class="btn btn-light col-md-12 mb-3" type="button" value="施設外">3</br>
                        <input class="btn btn-light col-md-12 mb-3" type="button" value="休む">4</br>
                       
                        
                    
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">コメント</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <input class="btn btn-primary col-md-3 mt-3 " type="button" value="送信"></br>
                        </div>
     /ボタンレイアウト確認 --}}
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
                                    {!! Form::select('select', ['0' => '選択してください', '1' => '通所する', '2' => '在宅ワーク', '3' => '施設外', '4' => '休む'], '0')!!}
                                    {{--{!! Form::select('select', ['0' => '通所', '1' => '在宅', '2' => '施設外', '3' => '休む'], null, ['placeholder' => '選択してください'])!!}--}}
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