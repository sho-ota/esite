@if (Auth::id() == $user_message->user_id)
    {{-- 投稿削除ボタンのフォーム --}}
    {{--{!! link_to_route('user.messages.destroy', "削除", [$user_message->id], ['class' => 'btn btn-primary']) !!}--}}
    {!! Form::open(['route' => ['user.messages.destroy', $user_message->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-outline-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif