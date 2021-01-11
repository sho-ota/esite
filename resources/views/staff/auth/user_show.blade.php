@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1>{{ $user->id }} {{ $user->last_name }} {{ $user->first_name }}</h1>
    </div>
</div>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card ">
                <div class="card-header text-center text-white bg-danger">出欠確認</div>
                <div class="card-body">{{ $attendance->what_day }} {{$attendanceList[$attendance->select]}}</div>
            </div>
{{---　一人の利用者と全スタッフのメッセージを表示-----------------------------------------------------------------------------------------}}
@if (count($message_from_staffs) > 0)
    <ul class="list-unstyled">
        @foreach ($message_from_staffs as $message_from_staff)
            <li class="media mb-3 ">
                <div class="media-body">
                    <div class="card bg-light">
                        <div class="card-body">
{{--                            <div style="display:inline-flex">--}}
                            <div class="d-flex justify-content-between">
                                {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                <div>
                                    <span class="text-muted">{{ $message_from_staff->staff->last_name }} {{ $message_from_staff->staff->first_name }}</span>
                                    <span class="text-muted"> {{ $message_from_staff->created_at }}</span>
                                </div>
                                <div>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            <div>
                                {{-- 投稿内容 e()は定義してる？ --}}
                                <p class="mb-0">{!! nl2br(e($message_from_staff->content)) !!}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $message_from_staffs->links() }}
@endif


@if (count($user_messages) > 0)
    <ul class="list-unstyled">
        @foreach ($user_messages as $user_message)
            <li class="media mb-3 ">
                <div class="media-body">
                    <div class="card bg-light">
                        <div class="card-body">
{{--                            <div style="display:inline-flex">--}}
                            <div class="d-flex justify-content-between">
                                {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                <div>
                                    <span class="text-muted">{{ $user_message->user->last_name }} {{ $user_message->user->first_name }}</span>
                                    <span class="text-muted"> {{ $user_message->created_at }}</span>
                                </div>
                                <div>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            <div>
                                {{-- 投稿内容 e()は定義してる？ --}}
                                <p class="mb-0">{!! nl2br(e($user_message->content)) !!}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $user_messages->links() }}
@endif
{{----　/一人の利用者と全スタッフのメッセージを表示--------------------------------------------------------------------------------------}}
            
            
        </div>
    </div>
</div>
@endsection