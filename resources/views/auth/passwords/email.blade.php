@extends('layouts.app')

@section('content')
<style>
html, body {
  height: 100%;
  margin: 0;
}

.galaxy-bg {
  min-height: 100vh;
  background: radial-gradient(circle at top, #1b1f4a, #0b0f2a 60%, #050617);
  position: relative;
  overflow: hidden;
}

#particles-js {
  position: absolute;
  inset: 0;
  z-index: 1;
}

.auth-wrapper {
  position: relative;
  z-index: 2;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth-card {
  width: 100%;
  max-width: 460px;
  background: rgba(255,255,255,.95);
  border-radius: 16px;
  box-shadow: 0 20px 50px rgba(0,0,0,.35);
}
</style>

<div class="galaxy-bg">
  <div id="particles-js"></div>

  <div class="auth-wrapper">
    <div class="auth-card card">
      <div class="card-header text-center bg-transparent border-0 pt-4">
        <h4 class="fw-bold">Lupa Password</h4>
        <p class="text-muted small mb-0">
          Masukkan email untuk menerima link reset password
        </p>
      </div>

      <div class="card-body px-4 pb-4">

        @if (session('status'))
          <div class="alert alert-success text-center">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   required
                   autofocus>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-grid mb-3">
            <button class="btn btn-primary btn-lg">
              Kirim Link Reset
            </button>
          </div>

          <div class="text-center">
            <a href="{{ route('login') }}" class="text-decoration-none small">
              Kembali ke Login
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

{{-- PARTICLES --}}
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
  particles: {
    number: { value: 90 },
    color: { value: ["#ffffff", "#8aa2ff", "#c58cff"] },
    shape: { type: "circle" },
    opacity: { value: 0.6 },
    size: { value: 2.5 },
    move: { enable: true, speed: 0.6 }
  },
  interactivity: {
    events: {
      onhover: { enable: true, mode: "repulse" }
    }
  }
});
</script>
@endsection
