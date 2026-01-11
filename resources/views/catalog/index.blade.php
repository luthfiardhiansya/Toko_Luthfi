@extends('layouts.constra')

@section('content')
<div class="container py-5">
    <div class="row">

        {{-- SIDEBAR --}}
        <div class="col-lg-3 mb-4">
            <div class="card filter-card">
                <div class="card-header">Filter Produk</div>
                <div class="card-body">
                    <form action="{{ route('catalog.index') }}" method="GET">

                    <h6>Kategori</h6>

                    {{-- SEMUA KATEGORI --}}
                    <div class="form-check mb-2">
                        <input class="form-check-input"
                            type="radio"
                            name="category"
                            value=""
                            onchange="this.form.submit()"
                            {{ request('category') == null ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold">
                            Semua Produk
                        </label>
                    </div>

                    {{-- LIST KATEGORI --}}
                    @foreach($categories as $cat)
                        <div class="form-check mb-1">
                            <input class="form-check-input"
                                type="radio"
                                name="category"
                                value="{{ $cat->slug }}"
                                onchange="this.form.submit()"
                                {{ request('category') == $cat->slug ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $cat->name }} ({{ $cat->products_count }})
                            </label>
                        </div>
                    @endforeach

                        <hr>

                        <h6>Harga</h6>
                        <div class="d-flex gap-2">
                            <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min">
                            <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max">
                        </div>

                        <button class="btn btn-warning w-100 mt-3 fw-semibold">Terapkan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- PRODUK --}}
        <div class="col-lg-9">

            <h4 class="mb-4 fw-bold">KATALOG PRODUK</h4>

            <div class="row row-cols-2 row-cols-md-4 g-4">
                @forelse($products as $product)
                    <div class="col">
                        <a href="{{ route('catalog.show', $product->slug) }}" class="neo-card">

                            <img src="{{ $product->image_url }}"
                                 alt="{{ $product->name }}">

                            <div class="neo-body">
                                <h5 class="product-name">{{ $product->name }}</h5>
                                <span>LIHAT PRODUK</span>
                                <div class="neo-line"></div>
                            </div>

                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Produk tidak ditemukan</p>
                    </div>
                @endforelse
            </div>

            <div class="section-divider"></div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

<style>
    :root {
    --yellow: #facc15;
    --yellow-dark: #eab308;
    --dark: #0f172a;
    --gray: #6b7280;
}

/* ================= CARD PRODUK ================= */
.neo-card {
    display: block;
    background: #0f172a;
    border-radius: 16px;
    overflow: hidden;
    text-decoration: none;
    height: 100%;
    transition: .3s ease;
    border: 2px solid transparent;
}

.neo-card:hover {
    transform: translateY(-6px);
    border-color: var(--yellow);
    box-shadow: 0 0 20px rgba(250,204,21,.4);
}

/* IMAGE */
.neo-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

/* BODY */
.neo-body {
    padding: 16px;
    text-align: center;
    color: #fff;
}

.neo-body h6 {
    font-weight: 700;
    margin-bottom: 8px;
}

.neo-body span {
    font-size: 13px;
    color: var(--yellow);
    letter-spacing: 1px;
}

/* LINE */
.neo-line {
    width: 50px;
    height: 2px;
    background: var(--yellow);
    margin: 10px auto 0;
}

/* ================= FILTER ================= */
.filter-card {
    border-radius: 12px;
}

.form-check-input:checked {
    background-color: var(--yellow);
    border-color: var(--yellow);
}

/* ================= DIVIDER ================= */
.section-divider {
    height: 1px;
    margin: 50px 0;
    background: linear-gradient(to right, transparent, var(--yellow), transparent);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .neo-card img {
        height: 170px;
    }
}

/* ================================
   PRODUCT NAME TYPOGRAPHY
================================ */
.product-name {
    font-size: 15px;
    font-weight: 600;
    color: #ffffff;
    line-height: 1.4;

    /* batas 2 baris */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    min-height: 42px; /* biar tinggi semua sama */
    margin-bottom: 6px;
    letter-spacing: 0.2px;
}

</style>