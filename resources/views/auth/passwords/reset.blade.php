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
  max-width: 480px;
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
        <h4 class="fw-bold">Reset Password</h4>
        <p class="text-muted small mb-0">
          Masukkan password baru untuk akun Anda
        </p>
      </div>

      <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ $email ?? old('email') }}"
                   required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password"
                   class="form-control"
                   name="password_confirmation"
                   required>
          </div>

          <div class="d-grid">
            <button class="btn btn-primary btn-lg">
              Reset Password
            </button>
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
    number: { value: 80 },
    color: { value: ["#ffffff", "#7aa2ff", "#b38bff"] },
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
