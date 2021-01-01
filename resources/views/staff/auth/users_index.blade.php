@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('staff.auth.nav_tabs')
                
                <div class="mb-2">
                    {{-- 利用者アカウント作成ページへのリンク --}}
                    {!! link_to_route('staff.users.create', '利用者アカウント作成', [], ['class' => 'btn btn-info btn-block']) !!}
                </div>
                
                @if (count($users) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>※test</th>
                                <th>名前</th>
                                <th>なまえ</th>
                                <th>メール</th>
                                <th>編集</th>
                                <th>P</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                {{--user.attendance.indexでやろうとするとauthが面倒なので、staff.user.attendances.showなどを使って新たにページを作ったほうが良さそう--}}
                                <td>{!! link_to_route('user.attendance.index', $user->last_name.' '.$user->first_name, [], ['class' => 'btn btn-info btn-sm']) !!}</td>
                                <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                                <td>{{ $user->last_name_hiragana }} {{ $user->first_name_hiragana }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! link_to_route('staff.users.edit', $user->id, [$user->id], ['class' => 'btn btn-info btn-sm']) !!}</td>
                                <td>{!! link_to_route('staff.users.show', $user->id, [$user->id], ['class' => 'btn btn-info btn-sm']) !!}</td>
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