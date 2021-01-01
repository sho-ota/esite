<ul class="nav nav-tabs mb-3">
    {{-- 利用者一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('staff.users.index') }}" class="nav-link {{ Request::routeIs('staff.users.index') ? 'active' : '' }}">
            利用者一覧
        </a>
    </li>
    {{-- スタッフ一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('staff.staffs.index') }}" class="nav-link {{ Request::routeIs('staff.staffs.index') ? 'active' : '' }}">
            スタッフ一覧
        </a>
    </li>
</ul>