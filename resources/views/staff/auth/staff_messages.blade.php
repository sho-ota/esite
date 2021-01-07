@extends('layouts.staff.app')

@section('content')
    @if (Auth::check())
        <div class="container ">
            <div class="row justify-content-center">
                {{--
                <aside class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ Auth::user()->last_name }}</h3>
                        </div>
                    </div>
                </aside>
                --}}
                <div class="col-md-6">
                    
                    {{--@include('user.auth.nav_tabs')--}}
                    @if (Auth::id() == $staff->id)
                        {{-- 投稿フォーム --}}
                        @include('messages.staff.store_form')
                    @endif
                    
    {{-- 投稿一覧 ----------------------------------------------------------}}
                    @include('messages.staff.index')
    {{-- /投稿一覧 ----------------------------------------------------------}}
                </div>
            </div>
        </div>
    @endif
@endsection