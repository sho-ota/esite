<div class="dropdown">
    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"></button>
    <div class="dropdown-menu">
        <span class="dropdown-item">
            {!! Form::open(['url' => 'user/room/'.$message_room_id.'/messages/'.$message->id , 'method' => 'delete']) !!}
                {!! Form::hidden('message_id',$message->id) !!}
                {!! Form::hidden('message_room_id',$message_room_id) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-link btn-sm']) !!}
            {!! Form::close() !!}
        </span>
    </div>
</div>