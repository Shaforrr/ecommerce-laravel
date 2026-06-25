@extends('layouts.admin.main')

@section('title', 'Detail Produk')

@section('content')

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Detail Produk</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item">

                    <a href="{{ route('admin.dashboard') }}">

                        Dashboard

                    </a>

                </div>

                <div class="breadcrumb-item">

                    <a href="{{ route('admin.product') }}">

                        Produk

                    </a>

                </div>

                <div class="breadcrumb-item active">

                    Detail Produk

                </div>

            </div>

        </div>

        <div class="section-body">

            <a href="{{ route('admin.product') }}"
               class="btn btn-warning mb-4">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

            <div class="row">

                <div class="col-lg-5">

                    <div class="card">

                        <div class="card-body text-center">

                            @if($product->image)

                                <img
                                    src="{{ asset('uploads/product/'.$product->image) }}"
                                    class="img-fluid rounded shadow"
                                    style="max-height:350px;">

                            @else

                                <img
                                    src="https://via.placeholder.com/350x350?text=No+Image"
                                    class="img-fluid">

                            @endif

                        </div>

                    </div>

                </div>

                <div class="col-lg-7">

                    <div class="card">

                        <div class="card-header">

                            <h4>

                                Informasi Produk

                            </h4>

                        </div>

                        <div class="card-body">

                            <table class="table table-borderless">

                                <tr>

                                    <th width="35%">

                                        Nama Produk

                                    </th>

                                    <td>

                                        {{ $product->name }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Harga

                                    </th>

                                    <td>

                                        Rp {{ number_format($product->price,0,',','.') }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Stock

                                    </th>

                                    <td>

                                        @if($product->stock>10)

                                            <span class="badge badge-success">

                                                {{ $product->stock }}

                                            </span>

                                        @elseif($product->stock>0)

                                            <span class="badge badge-warning">

                                                {{ $product->stock }}

                                            </span>

                                        @else

                                            <span class="badge badge-danger">

                                                Habis

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Deskripsi

                                    </th>

                                    <td>

                                        {{ $product->description }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                        <div class="card-footer text-right">

                            <a href="{{ route('product.edit',$product->id) }}"
                               class="btn btn-warning">

                                <i class="fas fa-edit"></i>

                                Edit Produk

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection