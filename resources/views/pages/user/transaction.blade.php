@extends('layouts.user.main')

@section('title','Riwayat Pembelian')

@section('content')

<div class="container mt-5 mb-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fas fa-shopping-cart"></i>
                Riwayat Pembelian
            </h4>

        </div>

        <div class="card-body">

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

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th width="5%">No</th>

                            <th>Produk</th>

                            <th width="10%">Qty</th>

                            <th width="20%">Total</th>

                            <th width="25%">Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($transactions as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                @if($item->product)

                                    {{ $item->product->name }}

                                @else

                                    <span class="text-danger">

                                        Produk sudah dihapus

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $item->qty }}

                            </td>

                            <td>

                                Rp {{ number_format($item->total,0,',','.') }}

                            </td>

                            <td>

                                {{ $item->created_at->format('d-m-Y H:i') }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                Belum ada riwayat pembelian.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection