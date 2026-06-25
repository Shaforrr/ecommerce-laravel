@extends('layouts.admin.main')

@section('title', 'Edit Produk')

@section('content')

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Edit Produk</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>

                <div class="breadcrumb-item active">
                    Edit Produk
                </div>

            </div>

        </div>

        <div class="section-body">

            <div class="card shadow">

                <div class="card-header">

                    <h4>Edit Data Produk</h4>

                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('product.update',$product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">

                            <label>Nama Produk</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name',$product->name) }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Deskripsi Produk</label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control"
                                required>{{ old('description',$product->description) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Harga</label>

                                    <input
                                        type="number"
                                        name="price"
                                        class="form-control"
                                        value="{{ old('price',$product->price) }}"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Stok</label>

                                    <input
                                        type="number"
                                        name="stock"
                                        class="form-control"
                                        value="{{ old('stock',$product->stock) }}"
                                        required>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Gambar Saat Ini</label>

                            <br>

                            @if($product->image)

                                <img
                                    src="{{ asset('uploads/product/'.$product->image) }}"
                                    width="180"
                                    class="img-thumbnail">

                            @else

                                <div class="text-muted">

                                    Tidak ada gambar

                                </div>

                            @endif

                        </div>

                        <div class="form-group">

                            <label>Upload Gambar Baru</label>

                            <input
                                type="file"
                                name="image"
                                class="form-control">

                            <small class="text-muted">

                                Kosongkan jika tidak ingin mengganti gambar.

                            </small>

                        </div>

                        <hr>

                        <div class="text-right">

                            <a href="{{ route('admin.product') }}"
                               class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="fas fa-save"></i>

                                Update Produk

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection