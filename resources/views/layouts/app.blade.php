<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Luthfi Store')</title>
    <meta name="description" content="@yield('meta_description', 'Toko online terpercaya dengan produk berkualitas')">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>
<body>
    <main class="min-vh-100">
        @yield('content')
    </main>


    @stack('scripts')

      <script>
      async function toggleWishlist(productId) {
        try {
          const token = document.querySelector('meta[name="csrf-token"]').content;
    
          const response = await fetch(`/wishlist/toggle/${productId}`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": token,
            },
          });
    
          if (response.status === 401) {
            window.location.href = "/login";
            return;
          }
    
          const data = await response.json();
    
          if (data.status === "success") {
            updateWishlistUI(productId, data.added); 
            updateWishlistCounter(data.count);
            showToast(data.message); 
          }
        } catch (error) {
          console.error("Error:", error);
          showToast("Terjadi kesalahan sistem.", "error");
        }
      }
    
      function updateWishlistUI(productId, isAdded) {
        const buttons = document.querySelectorAll(`.wishlist-btn-${productId}`);
    
        buttons.forEach((btn) => {
          const icon = btn.querySelector("i");
          if (isAdded) {
            icon.classList.remove("bi-heart", "text-secondary");
            icon.classList.add("bi-heart-fill", "text-danger");
          } else {
            icon.classList.remove("bi-heart-fill", "text-danger");
            icon.classList.add("bi-heart", "text-secondary");
          }
        });
      }
    
      function updateWishlistCounter(count) {
        const badge = document.getElementById("wishlist-count");
        if (badge) {
          badge.innerText = count;
          badge.style.display = count > 0 ? "inline-block" : "none";
        }
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script>
particlesJS("particles-js", {
  particles: {
    number: {
      value: 120,
      density: {
        enable: true,
        value_area: 900
      }
    },
    color: {
      value: ["#ffffff", "#9d7cff", "#5da9ff"]
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.6,
      random: true
    },
    size: {
      value: 2.5,
      random: true
    },
    line_linked: {
      enable: true,
      distance: 140,
      color: "#7b5cff",
      opacity: 0.25,
      width: 1
    },
    move: {
      enable: true,
      speed: 1.6,
      direction: "none",
      out_mode: "out"
    }
  },
  interactivity: {
    detect_on: "canvas",
    events: {
      onhover: {
        enable: true,
        mode: "grab"
      },
      onclick: {
        enable: true,
        mode: "push"
      }
    },
    modes: {
      grab: {
        distance: 160,
        line_linked: {
          opacity: 0.5
        }
      },
      push: {
        particles_nb: 4
      }
    }
  },
  retina_detect: true
});
</script>

</body>
</html>
