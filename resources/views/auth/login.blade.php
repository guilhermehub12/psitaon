<x-guest-layout>
    <p class="login-box-msg">Faça login para iniciar sua sessão.</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group">
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="E-mail"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <span class="text-danger">{{ $errors->first('email') }}</span>
        <div class="input-group mt-3">
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Senha"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <span class="text-danger">{{ $errors->first('password') }}</span>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-lila btn-block text-uppercase font-weight-bold">Entrar</button>
            </div>
        </div>
    </form>

    <p class="mb-1 mt-2">
        <a href="forgot-password.html" class="btn btn-lila btn-block text-uppercase font-weight-bold">Esqueci a minha senha</a>
    </p>
</x-guest-layout>
