@extends('layouts.admin.main')

@section('title', 'Tambah Produk')

@section('content')

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Tambah Produk</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>

                <div class="breadcrumb-item active">
                    Tambah Produk
                </div>

            </div>

        </div>

        <div class="section-body">

            <div class="card shadow">

                <div class="card-header">

                    <h4>Form Tambah Produk</h4>

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

                    <form action="{{ route('product.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label>Nama Produk</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Deskripsi Produk</label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="5"
                                required>{{ old('description') }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Harga</label>

                                    <input
                                        type="number"
                                        name="price"
                                        class="form-control"
                                        value="{{ old('price') }}"
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
                                        value="{{ old('stock') }}"
                                        required>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Gambar Produk</label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                required>

                            <small class="text-muted">

                                Format: JPG, JPEG, PNG (Maksimal 2 MB)

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

                                Simpan Produk

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection