@extends('layouts.constra1')

@section('title', 'Beranda')

@section('content')

<div class="banner-carousel banner-carousel-1 mb-0">
<div class="banner-carousel-item"style="background-image:linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),url('{{ asset('assets1/images/projects/smk.jpg') }}');">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h2 class="slide-title" data-animation-in="slideInLeft">Platform E-Commerce Pendidikan</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">Penyedia Peralatan Praktik SMK</h3>
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <a href="{{ route('catalog.index') }}" class="slider btn btn-primary">Kategori</a>
                    <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

<div class="banner-carousel-item"style="background-image:linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),url('{{ asset('assets1/images/projects/kunci.jpg') }}');">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title-box" data-animation-in="slideInDown">Mendukung Pendidikan Vokasional</h2>
                <h3 class="slide-title" data-animation-in="fadeIn">Peralatan Berkualitas & Terstandar</h3>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">Untuk Pembelajaran yang Lebih Optimal</h3>
                <p data-animation-in="slideInRight">
                    <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

<div class="banner-carousel-item"style="background-image:linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),url('{{ asset('assets1/images/projects/tkj.jpg') }}');">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title" data-animation-in="slideInDown">Solusi Praktik SMK Terpercaya</h2>
                <h3 class="slide-sub-title" data-animation-in="fadeIn">Mudah • Aman • Terintegrasi</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Kami menyediakan sistem pemesanan peralatan praktik SMK yang dirancang untuk mendukung proses belajar mengajar secara efektif dan efisien.</p>
                <div data-animation-in="slideInLeft">
                    <a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                    <a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class="py-5 featured-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Produk Unggulan</h2>
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('partials.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
      <div class="row text-center">

        <!-- TOTAL PRODUK -->
        <div class="col-md-4 col-sm-6 ts-facts">
          <div class="ts-facts-img">
            <img loading="lazy"
                 src="{{ asset('assets1/images/icon-image/produk.png') }}"
                 alt="Total Produk">
          </div>
          <div class="ts-facts-content">
            <h2 class="ts-facts-num">
              <span class="counterUp" data-count="{{ $totalProduk }}">0</span>
            </h2>
            <h3 class="ts-facts-title">Total Produk</h3>
          </div>
        </div>

        <!-- TOTAL KATEGORI -->
        <div class="col-md-4 col-sm-6 ts-facts mt-5 mt-md-0">
          <div class="ts-facts-img">
            <img loading="lazy"
                 src="{{ asset('assets1/images/icon-image/kategori.png') }}"
                 alt="Total Kategori">
          </div>
          <div class="ts-facts-content">
            <h2 class="ts-facts-num">
              <span class="counterUp" data-count="{{ $totalKategori }}">0</span>
            </h2>
            <h3 class="ts-facts-title">Total Kategori</h3>
          </div>
        </div>

        <!-- TOTAL PESANAN -->
        <div class="col-md-4 col-sm-6 ts-facts mt-5 mt-md-0">
          <div class="ts-facts-img">
            <img loading="lazy"
                 src="{{ asset('assets1/images/icon-image/pesanan.png') }}"
                 alt="Total Pesanan">
          </div>
          <div class="ts-facts-content">
            <h2 class="ts-facts-num">
              <span class="counterUp" data-count="{{ $totalPesanan }}">0</span>
            </h2>
            <h3 class="ts-facts-title">Total Pesanan</h3>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section id="news" class="news">
  <div class="container">

    <!-- Title -->
    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Pilihan Terbaru</h2>
        <h3 class="section-sub-title">Produk Terbaru LStore</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <!-- Products -->
    <div class="row mt-4">
      @foreach($latestProducts->take(3) as $product)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post h-100">

            <!-- Product Image -->
            <div class="latest-post-media">
              <a href="{{ route('catalog.show', $product->slug) }}" class="latest-post-img">
            <img src="{{ $product->image_url }}"
                 class="card-img-top"
                 alt="{{ $product->name }}"
                 style="height: 200px; object-fit: cover;">
              </a>
            </div>

            <!-- Product Body -->
            <div class="post-body text-center">
              <h4 class="post-title">
                <a href="{{ route('catalog.show', $product->slug) }}" class="d-inline-block">
                  {{ $product->name }}
                </a>
              </h4>

              <div class="latest-post-meta">
                <span class="post-item-date">
                  <i class="fa fa-tag"></i>
                  Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>
    <!--/ Content row end -->

    <!-- Button -->
    <div class="general-btn text-center mt-4">
      <a class="btn btn-primary" href="{{ route('catalog.index') }}">
        Lihat Semua Produk
      </a>
    </div>

  </div>
</section>

@endsection
