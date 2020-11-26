@extends('layouts.staff.app')

@section('content')

    @include('staff.auth.nav_tabs')

    <h1>スタッフ一覧</h1>

    @if (count($staffs) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>なまえ</th>
                    <th>メール</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->last_name }} {{ $staff->first_name }}</td>
                    <td>{{ $staff->last_name_hiragana }} {{ $staff->first_name_hiragana }}</td>
                    <td>{{ $staff->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- スタッフアカウント作成ページへのリンク --}}
    {!! link_to_route('staff.staffs.create', 'スタッフアカウント作成', [], ['class' => 'btn btn-primary']) !!}
    
    
    {{-- ページネーションのリンク--}}
    {{ $staffs->links() }}
@endsection