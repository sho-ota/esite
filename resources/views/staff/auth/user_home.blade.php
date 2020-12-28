@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1>{{ $user->id }} {{ $user->last_name }} {{ $user->first_name }}</h1>
    </div>
</div>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card ">
                <div class="card-header text-center text-white bg-danger">出欠確認</div>

                <div class="card-body">

                
            </div>
        </div>
    </div>
</div>
@endsection