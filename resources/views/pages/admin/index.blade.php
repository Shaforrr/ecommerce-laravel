@extends('layouts.admin.main')

@section('title', 'Dashboard Admin')

@section('content')

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Dashboard Admin</h1>

        </div>

        <div class="section-body">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="card card-statistic-1">

                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>

                        <div class="card-wrap">

                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>

                            <div class="card-body">
                                {{ $users }}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="card card-statistic-1">

                        <div class="card-icon bg-success">
                            <i class="fas fa-user-shield"></i>
                        </div>

                        <div class="card-wrap">

                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>

                            <div class="card-body">
                                {{ $admins }}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="card card-statistic-1">

                        <div class="card-icon bg-warning">
                            <i class="fas fa-box"></i>
                        </div>

                        <div class="card-wrap">

                            <div class="card-header">
                                <h4>Total Produk</h4>
                            </div>

                            <div class="card-body">
                                {{ $totalProducts }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card">

                <div class="card-header">

                    <h4>5 Produk Terbaru</h4>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="5%">No</th>

                                    <th width="15%">Gambar</th>

                                    <th>Nama Produk</th>

                                    <th>Harga</th>

                                    <th>Stok</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($products as $item)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        @if($item->image)

                                            <img src="{{ asset('uploads/product/'.$item->image) }}"
                                                 width="70"
                                                 class="img-thumbnail">

                                        @else

                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>

                                        @endif

                                    </td>

                                    <td>{{ $item->name }}</td>

                                    <td>Rp {{ number_format($item->price,0,',','.') }}</td>

                                    <td>{{ $item->stock }}</td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        Belum ada produk.

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