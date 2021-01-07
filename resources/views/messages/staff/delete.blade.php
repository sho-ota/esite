@if (Auth::id() == $staff_message->staff_id)
    {!! Form::open(['route' => ['staff.messages.destroy', $staff_message->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-outline-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif