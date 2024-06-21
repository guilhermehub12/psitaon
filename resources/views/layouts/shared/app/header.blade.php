<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a
                    class="btn btn-lila text-uppercase font-weight-bold"
                    href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                >
                    <i class="fas fa-power-off"></i> Sair
                </a>
            </form>
        </li>
    </ul>
</nav>
