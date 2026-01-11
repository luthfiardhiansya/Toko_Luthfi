@extends('layouts.app')

@section('content')
<div id="particles-js" class="login-wrapper">

  <div class="login-card">
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Login ke Akun Anda</h4>
      </div>

      <div class="card-body p-4">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="nama@email.com"
                   required autofocus>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   placeholder="••••••••"
                   required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3 form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label">Ingat Saya</label>
          </div>

          <button class="btn btn-primary w-100 btn-lg">
            Login
          </button>

          <div class="text-center mt-3">
            <a href="{{ route('password.request') }}" class="text-decoration-none">
              Lupa Password?
            </a>
          </div>

          <hr>

          <a href="{{ route('auth.google') }}"
             class="btn btn-outline-danger w-100 mb-3">
            Login dengan Google
          </a>

          <p class="text-center mb-0">
            Belum punya akun?
            <a href="{{ route('register') }}" class="fw-bold text-decoration-none">
              Daftar Sekarang
            </a>
          </p>

        </form>
      </div>
    </div>
  </div>

</div>
@endsection

<style>
.login-wrapper {
    position: relative;
    min-height: 100vh;
    background:
        radial-gradient(circle at top, #2d1b4e 0%, #0b061f 40%, #000 100%),
        linear-gradient(120deg, #1a1033, #000);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.login-card {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 420px;
    padding: 15px;
}

#particles-js canvas {
    position: absolute;
    inset: 0;
    z-index: 1;
}

</style>