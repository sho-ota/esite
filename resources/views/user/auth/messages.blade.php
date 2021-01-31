@extends('layouts.user.app')

@section('content')
    @if (Auth::check())
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-light mb-2">
                        <div class="card-body">
                            <h3>{{ $user->last_name }} {{ $user->first_name }}</h3>
                            <div>出欠確認：{{ $attendance->what_day }} {{ $week_list[$day_of_week] }} {{$attendanceList[$attendance->select]}}</div>
                        </div>
                    </div>
                    
                    @include('messages.user.store_form')
                    @if (count($messages) > 0)
                        <ul class="list-unstyled">
                            @foreach ($messages as $message)
                                <li class="media mb-2">
                                    <div class="media-body w-100">
                                        @include('messages.user.card')
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $messages->links() }}
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection