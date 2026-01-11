<header id="header" class="header-one">
  <div class="site-navigation">
    <div class="container-fluid px-4">
      <nav class="navbar navbar-expand-lg navbar-dark align-items-center">

        <a class="navbar-brand me-4" href="{{ route('home') }}">
          <img src="{{ asset('assets1/images/LSTORE3.png') }}"
               alt="LSTORE"
               style="height:46px; width:auto;">
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-collapse">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar-collapse" class="collapse navbar-collapse">

          <ul class="navbar-nav ms-4 me-4 align-items-center">
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('catalog.index') }}">Katalog</a>
            </li>
          </ul>

          <form class="d-flex mx-auto"
                style="max-width:520px; width:100%;"
                action="{{ route('catalog.index') }}"
                method="GET">
            <input class="form-control rounded-pill px-4"
                   type="search"
                   name="q"
                   placeholder="Cari produk..."
                   value="{{ request('q') }}">
          </form>

          @auth
          <ul class="navbar-nav ms-0 me-3 align-items-center gap-2">

            <li class="nav-item">
              <a class="nav-link position-relative px-2"
                 href="{{ route('wishlist.index') }}">
                <i class="bi bi-heart fs-5"></i>
                @if(auth()->user()->wishlists()->count())
                  <span class="badge bg-danger position-absolute top-0 start-100 translate-middle"
                        style="font-size:.6rem;">
                    {{ auth()->user()->wishlists()->count() }}
                  </span>
                @endif
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link position-relative px-2"
                 href="{{ route('cart.index') }}">
                <i class="bi bi-cart3 fs-5"></i>
                @php $cartCount = auth()->user()->cart?->items()->count() ?? 0; @endphp
                @if($cartCount)
                  <span class="badge bg-primary position-absolute top-0 start-100 translate-middle"
                        style="font-size:.6rem;">
                    {{ $cartCount }}
                  </span>
                @endif
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center px-2"
                 href="#"
                 data-bs-toggle="dropdown">
                <img src="{{ auth()->user()->avatar_url }}"
                     class="rounded-circle me-2"
                     width="32" height="32"
                     style="object-fit:cover;">
                <span class="d-none d-lg-inline">
                  {{ auth()->user()->name }}
                </span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end mt-2">
                <li>
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    Profil Saya
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('orders.index') }}">
                    Pesanan Saya
                  </a>
                </li>

                @if(auth()->user()->isAdmin())
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                      Admin Panel
                    </a>
                  </li>
                @endif

                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item text-danger">
                      Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>

          </ul>
          @endauth

        </div>
      </nav>
    </div>
  </div>
</header>