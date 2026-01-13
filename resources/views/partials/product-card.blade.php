<div class="card product-card h-100 border-0 shadow-sm">
    <div class="position-relative">
        <a href="{{ route('catalog.show', $product->slug) }}">
            <img src="{{ $product->image_url }}"
                 class="card-img-top"
                 alt="{{ $product->name }}"
                 style="height: 200px; object-fit: cover;">
        </a>

        @if($product->has_discount)
            <span class="badge-discount">
                -{{ $product->discount_percentage }}%
            </span>
        @endif

@auth
<button type="button"
        onclick="toggleWishlist({{ $product->id }})"
        class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle wishlist-btn-{{ $product->id }}">
    <i class="{{ auth()->user()->hasInWishlist($product) ? 'fas fa-heart text-danger' : 'far fa-heart' }}"></i>
</button>
@endauth

    </div>

    <div class="card-body d-flex flex-column">
        <small class="text-muted mb-1">{{ $product->category->name }}</small>
        
        <h6 class="card-title mb-2">
            <a href="{{ route('catalog.show', $product->slug) }}"
                class="text-decoration-none text-dark">
                {{ Str::limit($product->name, 40) }}
            </a>
        </h6>
        
        @if($product->stock <= 5 && $product->stock > 0)
            <small class="text-warning mt-2">
                <i class="fa fa-exclamation-triangle"></i>
                Stok tinggal {{ $product->stock }}
            </small>
        @elseif($product->stock == 0)
            <small class="text-danger mt-2">
                <i class="fa fa-times-circle"></i>
                Stok Habis
            </small>
        @endif

        <div class="mt-auto">
            @if($product->has_discount)
                <small class="text-muted text-decoration-line-through">
                    {{ $product->formatted_original_price }}
                </small>
            @endif
            <div class="fw-bold text-primary">
                {{ $product->formatted_price }}
            </div>
        </div>

    </div>

    <div class="card-footer bg-white border-0 pt-0">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">

            <button type="submit"
                    class="btn btn-primary btn-sm w-100"
                    @if($product->stock == 0) disabled @endif>
                <i class="fa fa-shopping-cart me-1"></i>
                @if($product->stock == 0)
                    Stok Habis
                @else
                    Tambah Keranjang
                @endif
            </button>
        </form>
    </div>
</div>
