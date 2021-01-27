@extends('layouts.staff.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="text-center mb-3">
                    <h4>マイページ</h4>
                </div>
                
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        {!! link_to_route('staff.users.index', 'アカウント一覧', [], ['class' => 'btn btn-outline-info btn-block']) !!}
                    </div>
                </div>
                
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