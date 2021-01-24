@extends('layouts.staff.app')

@section('content')

    @include('staff.auth.nav_tabs')

    <h1>利用者通所チェック表</h1>

    @if (count($users) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>通所</th>
                    <th>在宅</th>
                    <th>施設外</th>
                    <th>休み</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
{{--表示確認用--}}                    
<td>{{ $user->last_name }} {{ $user->first_name }}</td>
<td>{{ $user->id }}</td>
<td>{{ $user->id }}</td>
<td>{{ $user->id }}</td>
<td>{{ $user->id }}</td>
{{--／表示確認用--}}

{!! Form::model($attendance, ['route' => ['user.attendance.update', $attendance->id], 'method' => 'put']) !!}
                        
    <div class="form-group">
        {!! Form::label('select', 'ステータス:') !!}
        {!! Form::select('select', ['1' => '通所', '2' => '在宅', '3' => '施設外', '4' => '休む'], null, ['placeholder' => '選択してください'])!!}
    </div>
    
    <div class="form-group">
        {!! Form::label('comment', 'タスク:') !!}
        {!! Form::text('comment', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    
    
    
    {{-- ページネーションのリンク--}}
    {{ $users->links() }}
@endsection