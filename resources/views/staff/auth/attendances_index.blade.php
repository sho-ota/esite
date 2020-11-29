@extends('layouts.staff.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>利用者出欠確認表</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            {{-- 通所チェックページへのリンク
                            {!! link_to_route('staff.users.create', '通所チェック', [], ['class' => 'btn btn-primary']) !!} --}}
                        </div>
                    </div>
                </div>
                
                @if (count($attendances) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>出欠確認</th>
                                <th>名前</th>
                                <th>コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->select}}</td>
                                <td>{{ $attendance->user_id}}</td>{{--{{ App\Models\User::where('last_name',$attendance->user_id)}}--}}
                                <td>{{ $attendance->comment}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
                {{-- ページネーションのリンク
                {{ $users->links() }}--}}
            </div>
        </div>
    </div>

@endsection