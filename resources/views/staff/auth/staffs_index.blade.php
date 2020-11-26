@extends('layouts.staff.app')

@section('content')
    {{-- スタッフ一覧 --}}
    @if (count($staffs) > 0)
    <ul class="list-unstyled">
        @foreach ($staffs as $staff)
            <li class="media">
                <div class="media-body">
                    <div>
                        {{ $staff->last_name }}
                    </div>
                    <div>
                        {{ $staff->first_name }}
                    </div>
                    <div>
                        {{ $staff->first_name_hiragana }}
                    </div>
                    <div>
                        {{ $staff->first_name_hiragana }}
                    </div>
                    <div>
                        {{ $staff->email }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク 
    {{ $users->links() }}--}}
@endif
@endsection