@extends('layouts.staff.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h3>{{ $user->last_name }} {{ $user->first_name }}</h3>
                        <div>出欠確認：{{ $attendance->what_day }} {{$attendanceList[$attendance->select]}}</div>
                    </div>
                </div>

                @include('messages.staff.store_form')
                
                @if (count($messages) > 0)
                    <ul class="list-unstyled">
                        @foreach ($messages as $message)
                            <li class="media mb-3 ">
                                <div class="media-body">
                
                                    @include('messages.staff.card')
                
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
@endsection