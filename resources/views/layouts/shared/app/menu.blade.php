<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img
            src="{{ Vite::asset('resources/images/preloader.png') }}"
            alt="Lila Baking Studio Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
        >
        <span class="brand-text font-weight-light">Lila Baking Studio</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Vite::asset('resources/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ explode(' ', trim(Auth::user()->nome))[0] }}
                    <br>

                </a>
            </div>
        </div>
    </div>
</aside>
