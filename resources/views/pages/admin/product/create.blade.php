@extends('layouts.admin.main')

@section('title','Tambah Produk')

@section('content')

<div class="main-content">

<section class="section">

<div class="section-header">

<h1>Tambah Produk</h1>

</div>

<div class="card">

<div class="card-body">

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label>Nama Produk</label>
<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
</div>

<div class="form-group">
<label>Kategori</label>
<input type="text" name="category" class="form-control" value="{{ old('category') }}" required>
</div>

<div class="form-group">
<label>Deskripsi</label>
<textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
<label>Harga</label>
<input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
</div>

<div class="form-group">
<label>Stok</label>
<input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
</div>

<div class="form-group">
<label>Gambar Produk</label>
<input type="file" name="image" class="form-control" required>
</div>

<button class="btn btn-primary">
<i class="fas fa-save"></i>
Simpan Produk
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