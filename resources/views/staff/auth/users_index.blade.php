@extends('layouts.staff.app')

@section('content')
    {{-- 利用者一覧 --}}
    @if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body">
                    <div>
                        {{ $user->last_name }}
                    </div>
                    <div>
                        {{ $user->first_name }}
                    </div>
                    <div>
                        {{ $user->first_name_hiragana }}
                    </div>
                    <div>
                        {{ $user->first_name_hiragana }}
                    </div>
                    <div>
                        {{ $user->email }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク 
    {{ $users->links() }}--}}
@endif
@endsection