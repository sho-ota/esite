@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <div class="container mb-3">
                    <div class="row">
                        <h5>{{$request_what_day}} 利用者出欠確認表</h5>
                            {{-- 通所チェックページへのリンク
                            {!! link_to_route('staff.users.create', '通所チェック', [], ['class' => 'btn btn-primary']) !!} --}}
                    </div>
                </div>
                
                {{--
                @if (count($attendances) > 0)
                    <ul class="list-unstyled">
                        @foreach ($attendances as $attendance)
                            <li class="media mb-3 ">
                                <div class="media-body w-100">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            {!! link_to_route('staff.users.show', $usersList[$attendance->user_id]["last_name"]." ".$usersList[$attendance->user_id]["first_name"], [$usersList[$attendance->user_id]]) !!}
                                            {{$attendanceList[$attendance->select]}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                --}}
                
                @if (count($attendances) > 0)
                    <table class="table table-sm table-striped">
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td class="text-center">{{$attendanceList[$attendance->select]}}</td>
                                <td class="text-center">{!! link_to_route('staff.users.show', $usersList[$attendance->user_id]["last_name"]." ".$usersList[$attendance->user_id]["first_name"], [$usersList[$attendance->user_id]]) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
            </div>
        </div>
    </div>

@endsection