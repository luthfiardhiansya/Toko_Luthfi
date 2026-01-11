@if(session('success'))
<div class="alert alert-success alert-dismissible fade show alert-fix auto-dismiss" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    {{ session('success') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show alert-fix auto-dismiss" role="alert">
    <i class="bi bi-exclamation-triangle me-2"></i>
    {{ session('error') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible fade show alert-fix auto-dismiss" role="alert">
    <i class="bi bi-info-circle me-2"></i>
    {{ session('info') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<style>
/* ===============================
   ALERT CLOSE CLEAN (CONSTra FIX)
================================ */
.alert-fix {
    position: relative;
    padding-right: 3.5rem;
}

/* tombol */
.alert-fix .btn-close {
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);

    background: transparent !important;
    border: none !important;
    box-shadow: none !important;

    width: auto;
    height: auto;
    padding: 0;

    opacity: .6;
    cursor: pointer;
}

/* icon X */
.alert-fix .btn-close::before {
    content: "✕";
    font-size: 1.25rem;
    font-weight: 600;
    line-height: 1;
}

/* warna per alert */
.alert-success .btn-close::before { color: #0f5132; }
.alert-danger  .btn-close::before { color: #842029; }
.alert-info    .btn-close::before { color: #055160; }

.alert-fix .btn-close:hover {
    opacity: 1;
}

.alert-fix {
    position: relative;
    z-index: 1;
}

</style>
