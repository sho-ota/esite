@extends('layouts.staff.app')

@section('content')
    
    @include('staff.auth.nav_tabs')

    <h1>利用者一覧</h1>

    @if (count($users) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>なまえ</th>
                    <th>メール</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                    <td>{{ $user->last_name_hiragana }} {{ $user->first_name_hiragana }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- 利用者アカウント作成ページへのリンク --}}
    {!! link_to_route('staff.users.create', '利用者アカウント作成', [], ['class' => 'btn btn-primary']) !!}
    
    
    
    {{-- ページネーションのリンク--}}
    {{ $users->links() }}

@endsection