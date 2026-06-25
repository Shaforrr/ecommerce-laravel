@extends('layouts.user.main')

@section('title','Merch Store')

@section('content')

<div class="container mt-5">

<div class="row">

@forelse($products as $item)

<div class="col-lg-4 mb-4">

<div class="card shadow h-100">

@if($item->image)

<img src="{{ asset('uploads/product/'.$item->image) }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

@endif

<div class="card-body">

<h5>{{ $item->name }}</h5>

<p class="text-muted">

{{ $item->category }}

</p>

<h4 class="text-primary">

Rp {{ number_format($item->price,0,',','.') }}

</h4>

<p>

Stock :
<strong>{{ $item->stock }}</strong>

</p>

<a href="{{ route('user.product.detail',$item->id) }}"
class="btn btn-primary w-100">

Detail Produk

</a>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning">

Belum ada produk.

</div>

</div>

@endforelse

</div>

</div>

@endsection