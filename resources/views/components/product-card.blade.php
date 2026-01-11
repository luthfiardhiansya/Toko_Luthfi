@props(['product'])

<div class="card h-100 border-0 shadow-sm product-card">

    {{-- IMAGE --}}
    <div class="product-thumb">
        <img src="{{ $product->image_url }}"
             alt="{{ $product->name }}">
        
        @if($product->has_discount)
            <span class="badge bg-danger discount-badge">
                -{{ $product->discount_percentage }}%
            </span>
        @endif
    </div>

    {{-- BODY --}}
    <div class="card-body d-flex flex-column">
        <small class="text-muted mb-1">{{ $product->category->name }}</small>

        <h6 class="card-title mb-2">
            <a href="{{ route('catalog.show', $product->slug) }}"
               class="text-decoration-none text-dark">
                {{ $product->name }}
            </a>
        </h6>

        <div class="mt-auto d-flex justify-content-between align-items-center">
            <div>
                @if($product->has_discount)
                <small class="text-muted text-decoration-line-through">
                    {{ $product->formatted_original_price }}
                </small>
                    <p> <b class="fw-bold text-danger mb-0">
                        {{ $product->formatted_price }}
                    </b> </p>
                @else
                    <p class="fw-bold text-primary mb-0">
                        {{ $product->formatted_price }}
                    </p>
                @endif
            </div>

            <button type="button"
                onclick="toggleWishlist({{ $product->id }})"
                class="wishlist-btn-{{ $product->id }} btn btn-light btn-sm rounded-circle">
                <i class="bi {{ Auth::check() && Auth::user()->hasInWishlist($product) 
                    ? 'bi-heart-fill text-danger' 
                    : 'bi-heart text-secondary' }}"></i>
            </button>
        </div>
    </div>
</div>
