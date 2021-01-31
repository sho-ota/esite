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
                
                
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5>利用者出欠確認表</h5>
                        <div class="form-group">
{{--日付を入力し新規作成した時、利用者の各ページに出欠確認ボタンが生成されるが、
その下にある日付一覧が更新されないためエラーが起きる様子、AttendanceController＠storeのreturnに
HomeController＠indexを動かす記述を書けば良い？--}}
                            {!! Form::open(['route' => 'staff.user.attendances.store']) !!}
                                {!! Form::label('what_day', '日付を入力してください 例:2020-12-01 ') !!}
                                {!! Form::text('what_day', old('what_day'), ['class' => 'form-control']) !!}
                                {!! Form::submit('新規作成', ['class' => 'btn btn-info btn-block mt-2']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                
{!! Form::model("カレンダー", ['route' => 'staff.calendar', 'method' => 'get']) !!}
    {!! Form::submit("カレンダー", ['class' => 'btn btn-outline-info']) !!}
{!! Form::close() !!}
                
                <div class="text-center">
                    @if (count($what_days) > 0)
                        @foreach ($what_days as $what_day)
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    {!! Form::model($what_day, ['route' => ['staff.user.attendances.index', $what_day->what_day], 'method' => 'get']) !!}
                                        {!! Form::hidden('what_day',$what_day->what_day) !!}
                                        {!! Form::submit($what_day->what_day, ['class' => 'btn btn-link']) !!}
                                    {!! Form::close() !!}
                                </div>
                                <div>
                                    {!! Form::model($what_day, ['route' => ['staff.user.attendances.destroy',$what_day->what_day], 'method' => 'delete']) !!}
                                        {!! Form::hidden('what_day',$what_day->what_day) !!}
                                        {!! Form::submit("削除", ['class' => 'btn btn-link']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection