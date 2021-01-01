@if (count($user_messages) > 0)
    <ul class="list-unstyled">
        @foreach ($user_messages as $user_message)
            <li class="media mb-3 ">
                <div class="media-body">
                    <div class="card bg-light">
                        <div class="card-body">
{{--                            <div style="display:inline-flex">--}}
                            <div class="d-flex justify-content-between">
                                {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                <div>
                                    <span class="text-muted">{{ $user_message->user->last_name }} {{ $user_message->user->first_name }}</span>
                                    <span class="text-muted"> {{ $user_message->created_at }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">@include('messages.user.delete')</span>
                                </div>
                            </div>
{{--確認用ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー--}}
<div>確認用　id {{ $user_message->id }}</div>
{{--　/確認用ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー--}}
                            <div>
                                {{-- 投稿内容 e()は定義してる？ --}}
                                <p class="mb-0">{!! nl2br(e($user_message->content)) !!}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $user_messages->links() }}
@endif