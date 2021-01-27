<div class="card bg-light">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                @if ($message->account_type == 0)
                    @if ($message->staff_messages->isEmpty())
                        <h5><span class="badge badge-info">{{ 'スタッフ' }}</span></h5>
                        <span class="text-muted">{{ $message->created_at }}</span>
                    @else
                        <h5><span class="badge badge-info">{{ $message->staff_messages[0]['last_name'] }} {{ $message->staff_messages[0]['first_name'] }}</span></h5>
                        <span class="text-muted">{{ $message->created_at }}</span>
                    @endif
                @else
                    <h5><span class="badge badge-light">{{ $user->last_name }} {{ $user->first_name }}</span></h5>
                    <span class="text-muted">{{ $message->created_at }}</span>
                @endif
            </div>
            @if ($message->account_type == 0)
                @if (!$message->staff_messages->isEmpty())
                    @if (Auth::id() === $message->staff_messages[0]['id'])
                        @include('messages.staff.menu')
                    @endif
                @endif
            @endif
        </div>
        <div>
            <p class="mb-0">{!! nl2br(e($message->content)) !!}</p>
        </div>
    </div>
</div>