{!! Form::open(['route' => ['staff.messages.store', $message_room_id]]) !!}
    <div class="form-group">
        {!! Form::hidden('message_room_id',$message_room_id) !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '6']) !!}
        {!! Form::submit('送信', ['class' => 'btn btn-outline-info btn-block mt-2']) !!}
    </div>
{!! Form::close() !!}