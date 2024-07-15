<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.home.index') }}" class="brand-link">
        <img
            src="{{ Vite::asset('resources/images/preloader.png') }}"
            alt="PsiTáOn Logo"
            class="brand-image img-circle elevation-3 text-center"
            style="opacity: .8"
        >
        <span class="brand-text text-white font-weight-bold">Lila Baking</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Vite::asset('resources/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white font-weight-bold">
                    {{ explode(' ', trim(Auth::user()->nome))[0] }}
                    <br>
                    {{ Auth::user()->perfis->first()->nome }}
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.home.index') }}"
                        class="nav-link {{ request()->is('administracao') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                        <p class="text-white font-weight-bold">Dashboard</p>
                    </a>
                </li>
                {{-- <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.estados.index') }}"
                        class="nav-link {{ request()->is('administracao/estados*') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-map text-white"></i>
                        <p class="text-white font-weight-bold">Estados</p>
                    </a>
                </li> --}}
                <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.clientes.index') }}"
                        class="nav-link {{ request()->is('administracao/clientes*') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-restroom text-white"></i>
                        <p class="text-white font-weight-bold">Clientes</p>
                    </a>
                </li>
                <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.pedidos.index') }}"
                        class="nav-link {{ request()->is('administracao/pedidos*') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-gift text-white"></i>
                        <p class="text-white font-weight-bold">Pedidos</p>
                    </a>
                </li>
                <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.produtos.index') }}"
                        class="nav-link {{ request()->is('administracao/produtos*') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-box text-white"></i>
                        <p class="text-white font-weight-bold">Produtos</p>
                    </a>
                </li>
                <li class="nav-item text-uppercase">
                    <a
                        href="{{ route('admin.usuarios.index') }}"
                        class="nav-link {{ request()->is('administracao/usuarios*') ? 'active' : '' }}"
                    >
                        <i class="nav-icon fas fa-user text-white"></i>
                        <p class="text-white font-weight-bold">Usuários</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
