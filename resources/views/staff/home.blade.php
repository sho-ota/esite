@extends('layouts.staff.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="text-center mb-3">
                    <h4>マイページ</h4>
                </div>
                
{{--------------------------------------------------------------------------------------------------------------------}}
{{$year_month_day}}
{{$week_list[$day_of_week]}}
{{--------------------------------------------------------------------------------------------------------------------}}
                
                
                <div class="card bg-light mb-2">
                    <div class="card-body">
                        <h5>利用者出欠確認表作成</h5>
                        <div class="form-group">
{{--日付を入力し新規作成した時、利用者の各ページに出欠確認ボタンが生成されるが、
その下にある日付一覧が更新されないためエラーが起きる様子、AttendanceController＠storeのreturnに
HomeController＠indexを動かす記述を書けば良い？--}}
                            {!! Form::open(['route' => 'staff.user.attendances.store']) !!}
                                <div class="input-group mb-3">
                                    {!! Form::date('what_day', old('what_day'), ['class' => '']) !!}
                                    {{--{!! Form::text('what_day', old('what_day'), ['class' => '']) !!}--}}
                                    <div class="input-group-append">
                                        {!! Form::submit('新規作成', ['class' => 'btn btn-outline-info btn-sm']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
{{--    
{!! Form::model("カレンダー", ['route' => 'staff.calendar', 'method' => 'get']) !!}
    {!! Form::submit("カレンダー", ['class' => 'btn btn-outline-info']) !!}
{!! Form::close() !!}
--}}            
{!! Form::model("test", ['route' => 'staff.test.index', 'method' => 'get']) !!}
    {!! Form::submit("test", ['class' => 'btn btn-outline-info']) !!}
{!! Form::close() !!}
                <div class="text-center">
                    {{--------------------------------------------------------------------------------------}}
                    @if (count($what_days) > 0)
                        <div class="card bg-light mb-2">
                            <div class="card-body">
                                @foreach ($what_days as $what_day)
                                    <div class="d-flex justify-content-center">
                                        {!! Form::model($what_day->what_day, ['route' => ['staff.user.attendances.index', $what_day->what_day], 'method' => 'get']) !!}
                                            {!! Form::hidden('what_day',$what_day->what_day) !!}
                                            {!! Form::submit($what_day->what_day, ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection