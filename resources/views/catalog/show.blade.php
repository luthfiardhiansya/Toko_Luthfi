@extends('layouts.constra')

@section('title', $product->name)

@section('content')

<div class="container-keranjang py-4">

    {{-- BREADCRUMB --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('catalog.index') }}">Katalog</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('catalog.index', ['category' => $product->category->slug]) }}">
                    {{ $product->category->name }}
                </a>
            </li>
            <li class="breadcrumb-item active">
                {{ Str::limit($product->name, 30) }}
            </li>
        </ol>
    </nav>

    <div class="row">

        {{-- IMAGE --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="product-image-wrapper">
                    <img src="{{ $product->image_url }}"
                         id="main-image"
                         class="product-main-image"
                         alt="{{ $product->name }}">

                    @if($product->has_discount)
                        <span class="discount-badge">
                            -{{ $product->discount_percentage }}%
                        </span>
                    @endif
                </div>

                @if($product->images->count() > 1)
                    <div class="card-body">
                        <div class="d-flex gap-2 overflow-auto">
                            @foreach($product->images as $image)
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                     class="thumb-image"
                                     onclick="document.getElementById('main-image').src = this.src">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- DETAIL --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <span class="badge bg-light text-dark mb-2">
                        {{ $product->category->name }}
                    </span>

                    <h2 class="mb-3">{{ $product->name }}</h2>

                    {{-- PRICE & WISHLIST --}}
                    <div class="mb-4 d-flex justify-content-between align-items-start flex-wrap gap-3">

                        <div class="price-wrapper">
                            @if($product->has_discount)
                                <div class="old-price">
                                    {{ $product->formatted_original_price }}
                                </div>
                            @endif
                            <div class="new-price">
                                {{ $product->formatted_price }}
                            </div>
                        </div>

                        
                    </div>

                    {{-- STOCK --}}
                    <div class="mb-4">
                        @if($product->stock > 10)
                        <span class="badge bg-success">
                            <i class="fa fa-check-circle me-1"></i> Stok Tersedia
                        </span>
                        @elseif($product->stock > 0)
                        <span class="badge bg-warning text-dark">
                                <i class="fa fa-exclamation-triangle me-1"></i>
                                Stok Tinggal {{ $product->stock }}
                            </span>
                        @else
                            <span class="badge bg-danger">
                                <i class="fa fa-times-circle me-1"></i> Stok Habis
                            </span>
                        @endif
                    </div>

                    {{-- CART --}}
                    <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="row g-3 align-items-end">
                            <div class="col-auto">
                                <label class="form-label">Jumlah</label>
                                <div class="input-group" style="width: 140px;">
                                    <button type="button" class="btn btn-outline-secondary" onclick="decrementQty()">-</button>
                                    <input type="number"
                                    id="quantity"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ $product->stock }}"
                                           class="form-control text-center">
                                    <button type="button" class="btn btn-outline-secondary" onclick="incrementQty()">+</button>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit"
                                class="btn-keranjang btn-lg w-100"
                                        @if($product->stock == 0) disabled @endif>
                                        <i class="fa fa-shopping-cart me-2"></i>
                                        Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </form>

                    @auth
                    <form action="{{ route('wishlist.toggle', $product->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        <button type="submit"
                                class="btn btn-light rounded-circle"
                                title="Wishlist">
                            <i class="fa {{ auth()->user()->hasInWishlist($product)
                                ? 'fa-heart text-danger'
                                : 'fa-heart' }}"></i>
                        </button>
                    </form>
                    @endauth
                        
                        <hr>
                        
                        {{-- DESCRIPTION --}}
                        <h6>Deskripsi</h6>
                        <p class="text-muted">
                            {!! nl2br(e($product->description)) !!}
                        </p>
                        
                    </div>
            </div>
        </div>

    </div>
</div>

<style>
.container-keranjang {
    background-color: #9e9e9e;
    border-radius: 8px;
    max-width: 1100px;  
    margin: 30px auto;  
    padding: 24px;    
}

.breadcrumb-item a{
    color: red !important;
}
/* ===============================
   PRODUCT IMAGE
================================ */
.product-image-wrapper {
    position: relative;
    background: #f8f9fa;
    border-radius: 12px;
    overflow: hidden;
}

.product-main-image {
    height: 400px;
    width: 100%;
    object-fit: contain;
}

/* ===============================
   DISCOUNT BADGE
================================ */
.discount-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: #dc2626;
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    padding: 6px 12px;
    border-radius: 6px;
    box-shadow: 0 6px 16px rgba(220,38,38,.35);
    z-index: 10;
}

/* ===============================
   PRICE
================================ */
.price-wrapper {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.old-price {
    font-size: 14px;
    color: #9ca3af;
    text-decoration: line-through;
}

.new-price {
    font-size: 28px;
    font-weight: 800;
    color: #facc15;
}

/* ===============================
   WISHLIST
================================ */
.wishlist-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
}

.wishlist-btn i {
    font-size: 20px;
}

/* ===============================
   THUMBNAIL
================================ */
.thumb-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    cursor: pointer;
    border-radius: 8px;
    border: 1px solid #ddd;
    transition: 0.2s;
}

.thumb-image:hover {
    border-color: #facc15;
    transform: scale(1.05);
}

/* ===============================
   RESPONSIVE
================================ */
@media (max-width: 768px) {
    .product-main-image {
        height: 280px;
    }

    .new-price {
        font-size: 22px;
    }
}

</style>

@endsection
<script>
function incrementQty() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.max);

    let value = parseInt(input.value) || 1;

    if (value < max) {
        input.value = value + 1;
    }
}

function decrementQty() {
    const input = document.getElementById('quantity');
    const min = parseInt(input.min);

    let value = parseInt(input.value) || 1;

    if (value > min) {
        input.value = value - 1;
    }
}
</script>
