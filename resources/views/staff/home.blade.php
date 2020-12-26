@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1>{{ Auth::guard('staff')->user()->last_name }} {{ Auth::guard('staff')->user()->first_name }}</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">利用者出欠確認表</div>

                <div class="card-body">
                    
                        <div class="form-group">
{{--日付を入力し新規作成した時、利用者の各ページに出欠確認ボタンが生成されるが、
その下にある日付一覧が更新されないためエラーが起きる様子、AttendanceController＠storeのreturnに
HomeController＠indexを動かす記述を書けば良い？--}}
                            {!! Form::open(['route' => 'staff.user.attendances.store']) !!}
                                {!! Form::label('what_day', '日付を入力してください 例:2020-12-01 ') !!}
                                {!! Form::text('what_day', old('what_day'), ['class' => 'form-control']) !!}
                                {!! Form::submit('新規作成', ['class' => 'btn btn-primary btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    
                </div>
            </div>
            
            <div class="text-center">
                @if (count($what_days) > 0)
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($what_days as $what_day)
                            <tr>
                                <td>
                                    <a href="{{route('staff.user.attendances.index', ['what_day'=>$what_day->what_day])}}" >{{$what_day->what_day}}</a>
                                    {{--　↓この書き方だと失敗した
                                    {!! Form::model($what_day->what_day, ['route' => ['staff.user.attendances.index', $what_day->what_day], 'method' => 'put']) !!}
                                    {!! link_to_route('staff.user.attendances.index', $what_day->what_day, []) !!}
                                    {{Form::hidden('what_day',$what_day->what_day)}}
                                    {!! Form::close() !!}
                                    --}}
                                </td>
                {{-- what_dayグループ削除 確認用 --}}
                                <td>
                                    {!! Form::model($what_day, ['route' => ['staff.user.attendances.destroy',$what_day->what_day], 'method' => 'delete']) !!}
                                        {{Form::hidden('what_day',$what_day->what_day)}}
                                        {!! Form::submit("削除", ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                {{-- //what_dayグループ削除 確認用 --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection