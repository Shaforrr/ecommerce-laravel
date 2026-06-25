@extends('layouts.admin.main')

@section('title','Edit Produk')

@section('content')

<div class="main-content">

<section class="section">

<div class="section-header">

<h1>Edit Produk</h1>

</div>

<div class="card">

<div class="card-body">

<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="form-group">
<label>Nama Produk</label>
<input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
</div>

<div class="form-group">
<label>Kategori</label>
<input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
</div>

<div class="form-group">
<label>Deskripsi</label>
<textarea name="description" class="form-control" rows="5" required>{{ $product->description }}</textarea>
</div>

<div class="form-group">
<label>Harga</label>
<input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
</div>

<div class="form-group">
<label>Stok</label>
<input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
</div>

<div class="form-group">

<label>Gambar Saat Ini</label>

<br>

@if($product->image)

<img src="{{ asset('uploads/product/'.$product->image) }}" width="150" class="img-thumbnail">

@endif

</div>

<div class="form-group">
<label>Ganti Gambar</label>
<input type="file" name="image" class="form-control">
</div>

<button class="btn btn-primary">
<i class="fas fa-save"></i>
Update Produk
</button>

<a href="{{ route('admin.product') }}" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</section>

</div>

@endsection