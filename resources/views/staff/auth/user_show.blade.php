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