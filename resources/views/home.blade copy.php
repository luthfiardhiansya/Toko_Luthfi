@extends('layouts.constra')

@section('title', 'Beranda')

@section('content')
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-3">
                        Belanja Online Mudah & Terpercaya
                    </h1>
                    <p class="lead mb-4">
                        Temukan berbagai produk berkualitas dengan harga terbaik.
                        Gratis ongkir untuk pembelian pertama!
                    </p>
                    <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-bag me-2"></i>Mulai Belanja
                    </a>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <img src="{{ asset('images/tools.png') }}"
                         alt="Shopping" class="img-fluid" style="max-height: 400px;">
                </div>  
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Kategori Populer</h2>
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
                           class="text-decoration-none">
                            <div class="card border-0 shadow-sm text-center h-100">
                                <div class="card-body">
                                    <img src="{{ $category->image_url }}"
                                         alt="{{ $category->name }}"
                                         class="rounded-circle mb-3"
                                         width="80" height="80"
                                         style="object-fit: cover;">
                                    <h6 class="card-title mb-0">{{ $category->name }}</h6>
                                    <small class="text-muted">{{ $category->products_count }} produk</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
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

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card bg-warning text-dark border-0" style="min-height: 200px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h3>Flash Sale!</h3>
                            <p>Diskon hingga 50% untuk produk pilihan</p>
                            <a href="#" class="btn btn-dark" style="width: fit-content;">
                                Lihat Promo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-info text-white border-0" style="min-height: 200px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h3>Member Baru?</h3>
                            <p>Dapatkan voucher Rp 50.000 untuk pembelian pertama</p>
                            <a href="{{ route('register') }}" class="btn btn-light" style="width: fit-content;">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Produk Terbaru</h2>
            <div class="row g-4">
                @foreach($latestProducts as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('partials.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection



 < sectionclass  = "content" >
< divclass       = "container" >
< divclass       = "row" >
< divclass       = "col-lg-6" >
< h3class        = "column-title" > Testimonials <  / h3 >

< div id     = "testimonial-slide"class      = "testimonial-slide" >
< divclass   = "item" >
< divclass   = "quote-item" >
< spanclass  = "quote-text" >
Question ranoverhercheekWhenshereachedthefirsthillsoftheItalicMountains, she hadalast;
view backontheskylineofherhometownBookmarksgrove, the headlineofAlphabetVillage and the;
subline ofherownroad .
<  / span >

< divclass    = "quote-item-footer" >
< img loading = "lazy"class  = "testimonial-thumb"src = "{{('assets1/images/clients/testimonial1.png')}}"alt = "testimonial" >
< divclass    = "quote-item-info" >
< h3class     = "quote-author" > Gabriel Denis <  / h3 >
< spanclass   = "quote-subtext" > Chairman, OKT <  / span >
<  / div >
<  / div >
<  / div >  < ! --Quote itemend-- >
<  / div >
< ! -- / Item1end-- >

< divclass   = "item" >
< divclass   = "quote-item" >
< spanclass  = "quote-text" >
Lorem ipsumdolorsitamet, consectetur adipisicingelit, seddoeiusmod temporincidoneiduntut;
labore etdoloremagnaaliqua . Ut enimadminimveniam, quis nostrudexercitoationullamcolaboris;
nisi aliquipconsequat .
<  / span >

< divclass    = "quote-item-footer" >
< img loading = "lazy"class  = "testimonial-thumb"src = "{{('assets1/images/clients/testimonial2.png')}}"alt = "testimonial" >
< divclass    = "quote-item-info" >
< h3class     = "quote-author" > Weldon Cash <  / h3 >
< spanclass   = "quote-subtext" > CFO, First Choice <  / span >
<  / div >
<  / div >
<  / div >  < ! --Quote itemend-- >
<  / div >
< ! -- / Item2end-- >

< divclass   = "item" >
< divclass   = "quote-item" >
< spanclass  = "quote-text" >
Lorem ipsumdolorsitamet, consectetur adipisicingelit, seddoeiusmod temporincidoneiduntut;
labore etdoloremagnaaliqua . Ut enimadminimveniam, quis nostrudexercitoationullamcolaboris;
nisi utcommodoconsequat .
<  / span >

< divclass    = "quote-item-footer" >
< img loading = "lazy"class  = "testimonial-thumb"src = "{{('assets1/images/clients/testimonial3.png')}}"alt = "testimonial" >
< divclass    = "quote-item-info" >
< h3class     = "quote-author" > Minter Puchan <  / h3 >
< spanclass   = "quote-subtext" > Director, AKT <  / span >
<  / div >
<  / div >
<  / div >  < ! --Quote itemend-- >
<  / div >
< ! -- / Item3end-- >

<  / div >
< ! -- / Testimonial carouselend-- >
<  / div >  < ! --Col end-- >

< divclass  = "col-lg-6 mt-5 mt-lg-0" >

< h3class  = "column-title" > Happy Clients <  / h3 >

< divclass     = "row all-clients" >
< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('asset/assets1/images/clients/client1.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client1end-- >

< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('assets1/images/clients/client2.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client2end-- >

< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('assets1/images/clients/client3.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client3end-- >

< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('assets1/images/clients/client4.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client4end-- >

< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('assets1/images/clients/client5.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client5end-- >

< divclass     = "col-sm-4 col-6" >
< figureclass  = "clients-logo" >
< a href       = "#!" >  < img loading       = "lazy"class        = "img-fluid"src       = "{{('assets1/images/clients/client6.png')}}"alt       = "clients-logo" /  >  <  / a >
<  / figure >
<  / div >  < ! --Client6end-- >

<  / div >  < ! --Clients rowend-- >

<  / div >  < ! --Col end-- >

<  / div >
< ! -- / Content rowend-- >
<  / div >
< ! -- / Container end-- >
<  / section >  < ! --Content end-- >

< sectionclass  = "subscribe no-padding" >
< divclass      = "container" >
< divclass      = "row" >
< divclass      = "col-lg-4" >
< divclass      = "subscribe-call-to-acton" >
< h3 > Can WeHelp ?  <  / h3 >
< h4 > (+9)847 - 291 - 4353 <  / h4 >
<  / div >
<  / div >  < ! --Col end-- >

< divclass  = "col-lg-8" >
< divclass  = "ts-newsletter row align-items-center" >
< divclass  = "col-md-5 newsletter-introtext" >
< h4class   = "text-white mb-0" > Newsletter Sign - up <  / h4 >
< pclass    = "text-white" > Latest updates and news <  / p >
<  / div >

< divclass    = "col-md-7 newsletter-form" >
< form action = "#"method = "post" >
< divclass    = "form-group" >
< labelfor    = "newsletter-email"class    = "content-hidden" > Newsletter Email <  / label >
< input type  = "email"name  = "email"id  = "newsletter-email"class   = "form-control form-control-lg"placeholder  = "Your your email and hit enter"autocomplete  = "off" >
<  / div >
<  / form >
<  / div >
<  / div >  < ! --Newsletter end-- >
<  / div >  < ! --Col end-- >

<  / div >  < ! --Content rowend-- >
<  / div >
< ! -- / Container end-- >
<  / section >
< ! -- / subscribe end-- >
{

}
