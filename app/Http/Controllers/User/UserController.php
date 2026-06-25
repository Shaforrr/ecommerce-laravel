<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard User
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::latest()->get();

        return view('pages.user.index', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Produk
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }
}