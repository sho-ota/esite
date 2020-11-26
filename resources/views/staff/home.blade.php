@extends('layouts.staff.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- ユーザ一覧へのリンク --}}
            {!! link_to_route('staff.users.index', 'ユーザ一覧', [], ['class' => 'btn btn-primary']) !!}
            <div class="card">
                <div class="card-header">{{ Auth::guard('staff')->user()->last_name }} {{ Auth::guard('staff')->user()->first_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
