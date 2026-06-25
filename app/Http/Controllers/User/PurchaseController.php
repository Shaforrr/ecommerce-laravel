<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Proses Pembelian Produk
    |--------------------------------------------------------------------------
    */

    public function store($id)
    {
        // Cari produk
        $product = Product::findOrFail($id);

        // Cek stok
        if ($product->stock <= 0) {

            return redirect()
                ->back()
                ->with('error', 'Maaf, stok produk sudah habis.');

        }

        // Simpan transaksi
        Transaction::create([

            'user_id'    => Auth::id(),

            'product_id' => $product->id,

            'qty'        => 1,

            'total'      => $product->price,

        ]);

        // Kurangi stok produk
        $product->decrement('stock', 1);

        // Redirect ke halaman riwayat pembelian
        return redirect()
            ->route('user.transaction')
            ->with('success', 'Pembelian produk berhasil.');
    }

    /*
    |--------------------------------------------------------------------------
    | Riwayat Pembelian
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'pages.user.transaction',
            compact('transactions')
        );
    }
}