@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('staff.auth.nav_tabs')
                
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>利用者一覧</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            {{-- 利用者アカウント作成ページへのリンク --}}
                            {!! link_to_route('staff.users.create', '利用者アカウント作成', [], ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                
                @if (count($users) > 0)
                    <table class="table table-bordered">
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
                
                {{-- ページネーションのリンク--}}
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection