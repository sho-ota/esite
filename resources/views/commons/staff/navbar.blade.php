<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        @if (Auth::guard('staff')->check())
            <a class="navbar-brand" href="{{ route('staff.home.index') }}">{{ __('eサイト') }}</a>
        @else
            <a class="navbar-brand" href="/">{{ __('eサイト') }}</a>
        @endif
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::guard('staff')->check())
                    {{-- ドロップダウンメニュー --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('staff')->user()->last_name }} {{ Auth::guard('staff')->user()->first_name }} <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('staff.home.index') }}">
                                {{ __('マイページ') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('staff.users.index') }}">
                                {{ __('ユーザ一覧') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('staff.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>