{!! Form::open(['route' => 'staff.messages.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('送信', ['class' => 'btn btn-info btn-block']) !!}
    </div>
{!! Form::close() !!}