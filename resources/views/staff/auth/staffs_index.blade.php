@extends('layouts.staff.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('staff.auth.nav_tabs')
                
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>スタッフ一覧</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            {{-- スタッフアカウント作成ページへのリンク --}}
                            {!! link_to_route('staff.staffs.create', 'スタッフアカウント作成', [], ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
    
                @if (count($staffs) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>なまえ</th>
                                <th>メール</th>
                                <th>編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $staff->last_name }} {{ $staff->first_name }}</td>
                                <td>{{ $staff->last_name_hiragana }} {{ $staff->first_name_hiragana }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{!! link_to_route('staff.staffs.edit', $staff->id, [$staff->id], ['class' => 'btn btn-primary']) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
                {{-- ページネーションのリンク--}}
                {{ $staffs->links() }}
            </div>
        </div>
    </div>
    
@endsection