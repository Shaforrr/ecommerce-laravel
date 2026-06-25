@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.admin.main')

@section('title', 'Data Produk')

@section('content')

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Produk</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item active">
                    Produk
                </div>

            </div>

        </div>

        <div class="section-body">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4>Daftar Produk</h4>

                    <a href="{{ route('product.create') }}" class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Tambah Produk

                    </a>

                </div>

                <div class="card-body">

                    @include('sweetalert::alert')

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped text-center">

                            <thead class="thead-dark">

                                <tr>

                                    <th width="5%">No</th>

                                    <th width="15%">Gambar</th>

                                    <th>Nama Produk</th>

                                    <th>Harga</th>

                                    <th>Stok</th>

                                    <th width="20%">Aksi</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($products as $item)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        @if($item->image)

                                            <img
                                                src="{{ asset('uploads/product/'.$item->image) }}"
                                                width="70"
                                                class="img-thumbnail">

                                        @else

                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>

                                        @endif

                                    </td>

                                    <td class="text-left">

                                        <strong>{{ $item->name }}</strong>

                                        <br>

                                        <small class="text-muted">

                                            {{ Str::limit($item->description,40) }}

                                        </small>

                                    </td>

                                    <td>

                                        Rp {{ number_format($item->price,0,',','.') }}

                                    </td>

                                    <td>

                                        @if($item->stock > 10)

                                            <span class="badge badge-success">

                                                {{ $item->stock }}

                                            </span>

                                        @elseif($item->stock > 0)

                                            <span class="badge badge-warning">

                                                {{ $item->stock }}

                                            </span>

                                        @else

                                            <span class="badge badge-danger">

                                                Habis

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('product.edit',$item->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="fas fa-edit"></i>

                                            Edit

                                        </a>

                                        <form
                                            action="{{ route('product.delete',$item->id) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                                <i class="fas fa-trash"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="6">

                                        Belum ada data produk.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection