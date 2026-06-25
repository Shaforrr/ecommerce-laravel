<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();

        $admins = Admin::count();

        $totalProducts = Product::count();

        $products = Product::latest()
            ->take(5)
            ->get();

        return view('pages.admin.index', compact(
            'users',
            'admins',
            'totalProducts',
            'products'
        ));
    }
}