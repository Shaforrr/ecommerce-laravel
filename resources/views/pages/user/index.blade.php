@extends('layouts.user.main')

@section('content')

<!-- Banner -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">

            <div class="col-lg-5">
                <div class="banner-content">
                    <h1>Merch Store</h1>

                    <p>
                        Selamat datang di Merch Store.
                        Silahkan pilih produk favorit Anda.
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <img class="img-fluid"
                    src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}">
            </div>

        </div>
    </div>
</section>

<!-- Product -->

<section class="section_gap">

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-6 text-center">

<div class="section-title">

<h1>Latest Products</h1>

</div>

</div>

</div>

<div class="row">

@forelse($products as $item)

<div class="col-lg-3 col-md-6">

<div class="single-product">

@if($item->image)

<img class="img-fluid"
src="{{ asset('uploads/product/'.$item->image) }}">

@endif

<div class="product-details">

<h6>{{ $item->name }}</h6>

<div class="price">

<h6>
Rp {{ number_format($item->price,0,',','.') }}
</h6>

</div>

<div class="prd-bottom">

<a href="#" class="social-info">

<span class="ti-bag"></span>

<p class="hover-text">Beli</p>

</a>

<a href="#" class="social-info">

<span class="lnr lnr-move"></span>

<p class="hover-text">Detail</p>

</a>

</div>

</div>

</div>

</div>

@empty

<div class="col-lg-12">

<h3 class="text-center">
Tidak ada produk
</h3>

</div>

@endforelse

</div>

</div>

</section>

@endsection