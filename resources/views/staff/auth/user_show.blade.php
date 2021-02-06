@extends('layouts.staff.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card bg-light mb-2">
                    <div class="card-body">
                        <h3>{{ $user->last_name }} {{ $user->first_name }}</h3>
        
                        @if($user->attendances()->where('what_day', $year_month_day)->exists())
                            <div>出欠確認：{{ $attendance->what_day }} {{ $week_list[$day_of_week] }} {{$attendanceList[$attendance->select]}}</div>
                        @else
                            <div>出欠確認：{{ $year_month_day }} {{ $week_list[$day_of_week] }}</div>
                        @endif
                    </div>
                </div>

                @include('messages.staff.store_form')
                
                @if (count($messages) > 0)
                    <ul class="list-unstyled">
                        @foreach ($messages as $message)
                            <li class="media mb-2 ">
                                <div class="media-body w-100">
                
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