<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        @if (!Route::is('home.index'))
        @if (!Route::is('admin.home.index'))
            <li class="nav-item">
                <a href="{{ route('admin.home.index') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-home"></i> Página Inicial
                </a>
            </li>
        @endif
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ Vite::asset('resources/images/user.png') }}" class="img-circle elevation-2"
                    style="width: 30px; heigth: 30px" alt="User Image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <strong class="dropdown-item fw-bold">{{ explode(' ', trim(Auth::user()->nome))[0] }} | {{ Auth::user()->perfis->first()->nome }}</strong>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.home.index') }}"
                    class="dropdown-item nav-link {{ request()->is('administracao') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i>Painel
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.usuarios.index') }}"
                    class="dropdown-item nav-link {{ request()->is('administracao/usuarios') ? 'active' : '' }}">
                    <i class="fas fa-users mr-2"></i>Usuários
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item dropdown-footer btn text-uppercase font-weight-bold"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-power-off"></i> Sair
                    </a>
                </form>
            </div>
        </li>
    </ul>

</nav>
