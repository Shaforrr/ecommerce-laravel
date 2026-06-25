<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menampilkan Semua Produk
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::latest()->get();

        return view('pages.admin.product.index', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Tambah Produk
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('pages.admin.product.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Produk
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:100',
            'category'    => 'required|max:100',
            'description' => 'required',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/product'),
                $imageName
            );
        }

        Product::create([
            'name'        => $request->name,
            'category'    => $request->category,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imageName,
        ]);

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Produk
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.product.detail', compact('product'));
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.product.edit', compact('product'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Produk
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|max:100',
            'category'    => 'required|max:100',
            'description' => 'required',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            if (
                $product->image &&
                file_exists(public_path('uploads/product/' . $product->image))
            ) {
                unlink(public_path('uploads/product/' . $product->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/product'),
                $imageName
            );
        }

        $product->update([
            'name'        => $request->name,
            'category'    => $request->category,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imageName,
        ]);

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Produk
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (
            $product->image &&
            file_exists(public_path('uploads/product/' . $product->image))
        ) {
            unlink(public_path('uploads/product/' . $product->image));
        }

        $product->delete();

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil dihapus.');
    }
}