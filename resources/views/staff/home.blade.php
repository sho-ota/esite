@extends('layouts.staff.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
{{--@include('staff.auth.nav_tabs')--}}
                <div class="card">
                    <div class="card-header text-center">利用者出欠確認表</div>
    
                    <div class="card-body">
{{--{!! link_to_route('staff.messages.index', "メッセージ", [Auth::guard('staff')->user()->id], ['class' => 'btn btn-primary']) !!}--}}
{{--
{!! Form::model(Auth::guard('staff')->user()->id, ['route' => ['staff.messages.index', Auth::guard('staff')->user()->id], 'method' => 'get']) !!}
    {!! Form::hidden('id',Auth::guard('staff')->user()->id) !!}
    {!! Form::submit(Auth::guard('staff')->user()->id, ['class' => 'btn btn-info btn-block btn-sm']) !!}
{!! Form::close() !!}
--}}
--------------------------------------------------------------------</br>
{{ Auth::guard('staff')->user()->id}}
{{ Auth::guard('staff')->user()->last_name}}
{{ Auth::guard('staff')->user()->first_name}}
{{ Auth::guard('staff')->user()->last_name_hiragana}}
{{ Auth::guard('staff')->user()->first_name_hiragana}}
{{ Auth::guard('staff')->user()->email}}</br>
--------------------------------------------------------------------</br>
                        <div class="form-group">
{{--日付を入力し新規作成した時、利用者の各ページに出欠確認ボタンが生成されるが、
その下にある日付一覧が更新されないためエラーが起きる様子、AttendanceController＠storeのreturnに
HomeController＠indexを動かす記述を書けば良い？--}}
                            {!! Form::open(['route' => 'staff.user.attendances.store']) !!}
                                {!! Form::label('what_day', '日付を入力してください 例:2020-12-01 ') !!}
                                {!! Form::text('what_day', old('what_day'), ['class' => 'form-control']) !!}
                                {!! Form::submit('新規作成', ['class' => 'btn btn-info btn-block']) !!}
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
                                    <td class="d-flex justify-content-center">
                                        <div class="mr-3">
                                            {!! Form::model($what_day, ['route' => ['staff.user.attendances.index', $what_day->what_day], 'method' => 'get']) !!}
                                                {!! Form::hidden('what_day',$what_day->what_day) !!}
                                                {!! Form::submit($what_day->what_day, ['class' => 'btn btn-info btn-block btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div>
                                            {!! Form::model($what_day, ['route' => ['staff.user.attendances.destroy',$what_day->what_day], 'method' => 'delete']) !!}
                                                {!! Form::hidden('what_day',$what_day->what_day) !!}
                                                {!! Form::submit("削除", ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
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

{{--
<div class="card-body">
    <div class="d-flex justify-content-between">
        <div>
            <span class="text-muted">{{ $user_message->user->last_name }} {{ $user_message->user->first_name }}</span>
            <span class="text-muted"> {{ $user_message->created_at }}</span>
        </div>
        <div>
            <span class="text-muted">@include('messages.user.delete')</span>
        </div>
    </div>
</div>
--}}