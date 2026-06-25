@extends('layouts.user.main')

@section('title','Detail Produk')

@section('content')

<div class="container mt-5 mb-5">

    <div class="row">

        <div class="col-lg-5">

            <div class="card shadow">

                <div class="card-body text-center">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/product/'.$product->image) }}"
                            class="img-fluid rounded"
                            style="max-height:450px;object-fit:cover;">

                    @else

                        <img
                            src="https://via.placeholder.com/450x450?text=No+Image"
                            class="img-fluid rounded">

                    @endif

                </div>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="mb-3">

                        {{ $product->name }}

                    </h2>

                    <hr>

                    <table class="table table-borderless">

                        <tr>

                            <th width="30%">

                                Kategori

                            </th>

                            <td>

                                {{ $product->category }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Harga

                            </th>

                            <td>

                                <h4 class="text-primary">

                                    Rp {{ number_format($product->price,0,',','.') }}

                                </h4>

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Stok

                            </th>

                            <td>

                                @if($product->stock > 10)

                                    <span class="badge badge-success">

                                        {{ $product->stock }}

                                    </span>

                                @elseif($product->stock > 0)

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

                    <hr>

                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    @if(session('error'))

                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>

                    @endif

                    @if($product->stock > 0)

                        <form action="{{ route('purchase.store',$product->id) }}" method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-success">

                                <i class="fas fa-shopping-cart"></i>

                                Beli Sekarang

                            </button>

                        </form>

                    @else

                        <button
                            class="btn btn-danger"
                            disabled>

                            <i class="fas fa-times-circle"></i>

                            Stock Habis

                        </button>

                    @endif

                    <a
                        href="{{ route('user.dashboard') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection