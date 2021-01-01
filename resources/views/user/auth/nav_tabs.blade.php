<ul class="nav nav-tabs mb-3">
    {{-- 利用者一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('user.home.index') }}" class="nav-link {{ Request::routeIs('user.home.index') ? 'active' : '' }}">
            通所スタンプ
        </a>
    </li>
    {{-- スタッフ一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('user.messages.index') }}" class="nav-link {{ Request::routeIs('user.messages.index') ? 'active' : '' }}">
            メッセージ
        </a>
    </li>
</ul>