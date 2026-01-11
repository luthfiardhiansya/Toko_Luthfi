@extends('layouts.app')

@section('content')

<style>
html, body {
    height: 100%;
}

.login-wrapper {
    position: relative;
    min-height: 100vh;
    background: radial-gradient(circle at top, #2b1055, #000000 70%);
    overflow: hidden;
}

/* PARTICLES */
#particles-js {
    position: absolute;
    inset: 0;
    z-index: 1;
}

/* CARD CONTAINER */
.login-card {
    position: relative;
    z-index: 2;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* CARD */
.login-card .card {
    width: 100%;
    max-width: 430px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(14px);
    border-radius: 18px;
    color: #fff;
}

.login-card label {
    color: #ddd;
}

.login-card .form-control {
    background: rgba(255,255,255,0.15);
    border: none;
    color: #fff;
}

.login-card .form-control::placeholder {
    color: #ccc;
}

.login-card .form-control:focus {
    background: rgba(255,255,255,0.25);
    box-shadow: none;
    color: #fff;
}

.login-card .btn-primary {
    background: linear-gradient(135deg, #6f42c1, #4dabf7);
    border: none;
}

.login-card a {
    color: #9ecbff;
}
</style>

<div class="login-wrapper">
    <div id="particles-js"></div>

    <div class="login-card">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center bg-transparent border-0">
                <h4 class="fw-bold">Buat Akun Baru</h4>
                <small class="text-light">Daftar untuk melanjutkan</small>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary btn-lg rounded-pill">
                            Daftar
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <small class="text-light">atau daftar dengan</small>
                    </div>

                    <div class="d-grid mt-2">
                        <a href="{{ route('auth.google') }}"
                           class="btn btn-outline-light rounded-pill">
                            Daftar dengan Google
                        </a>
                    </div>

                    <p class="text-center mt-4 mb-0">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-bold">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
  particles: {
    number: { value: 120 },
    color: { value: ["#ffffff","#9d7cff","#5da9ff"] },
    shape: { type: "circle" },
    opacity: { value: 0.6 },
    size: { value: 2.5 },
    line_linked: {
      enable: true,
      distance: 140,
      color: "#7b5cff",
      opacity: 0.25
    },
    move: { enable: true, speed: 1.6 }
  }
});
</script>

@endsection
