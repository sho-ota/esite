@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="text-center mb-3">
                    <h4>利用者一覧</h4>
                </div>

                {!! link_to_route('staff.users.create', '利用者アカウント作成', [], ['class' => 'btn btn-outline-info btn-block mb-3']) !!}
                
                @if (count($users) > 0)
                    <ul class="list-unstyled">
                        @foreach ($users as $user)
                        <li class="media mb-2">
                            <div class="media-body">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="font-weight-bold">{!! link_to_route('staff.users.show', $user->last_name.' '.$user->first_name, [$user->id]) !!}</div>
                                                <div>{{ $user->last_name_hiragana }} {{ $user->first_name_hiragana }}</div>
                                                <div>{{ $user->email }}</div>
                                            </div>
                                            <div>{!! link_to_route('staff.users.edit', '編集', [$user->id], ['class' => 'btn btn-outline-info btn-sm']) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
                
                {{-- ページネーションのリンク--}}
                {{ $users->links() }}
                
            </div>
        </div>
    </div>
@endsection