<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0">
    <div class="container d-flex justify-content-center align-items-center">
        <ul class="navbar-nav d-flex justify-content-center align-items-center w-100" style="">
            <li class="nav-item mr-auto d-flex">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>


            <li class="nav-item mx-auto" style="height: 50px;">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <h2 style="font-family: Hundrake, Arial; color: #153448;">PsiTáOn</h2>
                </a>
            </li>

            <li class="nav-item dropdown ml-auto">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="{{ Vite::asset('resources/images/user.png') }}" class="img-circle elevation-2"
                        style="width: 40px; height: 40px" alt="User Image">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <strong class="dropdown-item fw-bold">{{ explode(' ', trim(Auth::user()->nome))[0] }} |
                        {{ Auth::user()->perfis->first()->nome }}</strong>
                    <div class="dropdown-divider"></div>
                    <a href="#"
                        class="dropdown-item nav-link {{ request()->is('administracao') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt mr-2"></i>Painel
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#"
                        class="dropdown-item nav-link {{ request()->is('administracao/usuarios') ? 'active' : '' }}">
                        <i class="fas fa-users mr-2"></i>Usuários
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item dropdown-footer btn text-uppercase font-weight-bold"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-power-off"></i> Sair
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
