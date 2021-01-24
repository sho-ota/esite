<div class="dropdown">
    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"></button>
    <div class="dropdown-menu">
        <span class="dropdown-item">
            {!! Form::open(['url' => 'staff/room/'.$message_room_id.'/messages/'.$message->id , 'method' => 'delete']) !!}
                {!! Form::hidden('message_id',$message->id) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-link btn-sm']) !!}
            {!! Form::close() !!}
        </span>
    </div>
</div>