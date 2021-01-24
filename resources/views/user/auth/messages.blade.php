@extends('layouts.user.app')

@section('content')
    @if (Auth::check())
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @include('messages.user.store_form')
                    @if (count($messages) > 0)
                        <ul class="list-unstyled">
                            @foreach ($messages as $message)
                                <li class="media mb-3 ">
                                    <div class="media-body">
                                        @include('messages.user.card')
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $messages->links() }}
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection