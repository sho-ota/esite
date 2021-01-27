<ul class="nav flex-column nav-pills nav-fill">
    <li class="nav-item">
        <a href="{{ route('staff.users.index') }}" class="btn btn-outline-info btn-block mb-2 {{ Request::routeIs('staff.users.index') ? 'active' : '' }}">
            利用者一覧
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('staff.staffs.index') }}" class="btn btn-outline-info btn-block mb-2 {{ Request::routeIs('staff.staffs.index') ? 'active' : '' }}">
            スタッフ一覧
        </a>
    </li>
</ul>