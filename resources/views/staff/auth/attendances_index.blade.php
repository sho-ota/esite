@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{$request_what_day}} 利用者出欠確認表</p>
                        </div>
                        <div class="col-md-6 text-right">
                            {{-- 通所チェックページへのリンク
                            {!! link_to_route('staff.users.create', '通所チェック', [], ['class' => 'btn btn-primary']) !!} --}}
                        </div>
                    </div>
                </div>
                @if (count($attendances) > 0)
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr>
                                {{--<td class="text-right"><span class="badge badge-danger">{{$attendanceList[$attendance->select]}}</span></td>--}}
                                <td class="text-center">{{$attendanceList[$attendance->select]}}</td>
                                <td>{{$usersList[$attendance->user_id]["last_name"]}} {{$usersList[$attendance->user_id]["first_name"]}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
                
                {{--
                @if (count($attendances) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>出欠</th>
                                <th>名前</th>
                                {{--<th>コメント</th>--}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{$attendanceList[$attendance->select]}}</td>
                                <td>{{$usersList[$attendance->user_id]["last_name"]}} {{$usersList[$attendance->user_id]["first_name"]}}</td>
                                {{--<td>{{ $attendance->comment}}</td>--}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                --}}
                
                {{-- ページネーションのリンク
                {{ $users->links() }}--}}
            </div>
        </div>
    </div>

@endsection