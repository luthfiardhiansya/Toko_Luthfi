<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Lutfi Store</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="constra" />

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="{{asset('assets1/images/LSTORE2.png')}}">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('assets1/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{asset('assets1/plugins/fontawesome/css/all.min.css')}}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{asset('assets1/plugins/animate-css/animate.css')}}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{asset('assets1/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/plugins/slick/slick-theme.css')}}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{asset('assets1/plugins/colorbox/colorbox.css')}}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="body-inner">
    <!--/ Topbar end -->

<!-- Header start -->
    @include('partials1.header')
<!--/ Header end -->

<div class="container mt-3 position-relative" style="z-index: 1;">
    @include('partials.flash-messages')
</div>


<main class="min-vh-100">
        @yield('content')
</main>

    @include('partials1.footer')

    @stack('scripts')

  <script src="{{asset('assets1/plugins/jQuery/jquery.min.js')}}"></script>

  <script src="{{asset('assets1/plugins/slick/slick.min.js')}}"></script>

  <script src="{{asset('assets1/plugins/slick/slick-animation.min.js')}}"></script>

  <script src="{{asset('assets1/plugins/colorbox/jquery.colorbox.js')}}"></script>

  <script src="{{asset('assets1/plugins/shuffle/shuffle.min.js')}}" defer></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>

  <script src="{{asset('assets1/plugins/google-map/map.js')}}" defer></script>

  <script src="{{asset('assets1/js/script.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  </div><!-- Body inner end -->
  <script>
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        document.querySelectorAll('.auto-dismiss').forEach(alert => {
            alert.classList.remove('show');
            alert.classList.add('hide');

            setTimeout(() => {
                alert.remove();
            }, 300);
        });
    }, 2000);
});
</script>
  </body>
  </html>