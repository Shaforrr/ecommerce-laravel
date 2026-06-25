<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tampilkan Semua Produk
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
            'name'        => 'required|max:255',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/product'),
                $imageName
            );
        }

        Product::create([

            'name' => $request->name,

            'description' => $request->description,

            'price' => $request->price,

            'stock' => $request->stock,

            'image' => $imageName

        ]);

        Alert::success('Berhasil','Produk berhasil ditambahkan');

        return redirect()->route('admin.product');
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'pages.admin.product.edit',
            compact('product')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Produk
    |--------------------------------------------------------------------------
    */

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $request->validate([

            'name'=>'required|max:255',

            'description'=>'required',

            'price'=>'required|numeric',

            'stock'=>'required|numeric',

            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        if($request->hasFile('image')){

            if(
                $product->image &&
                file_exists(public_path('uploads/product/'.$product->image))
            ){

                unlink(
                    public_path('uploads/product/'.$product->image)
                );

            }

            $imageName=time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/product'),
                $imageName
            );

            $product->image=$imageName;
        }

        $product->name=$request->name;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->stock=$request->stock;

        $product->save();

        Alert::success(
            'Berhasil',
            'Produk berhasil diupdate'
        );

        return redirect()->route('admin.product');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Produk
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if(
            $product->image &&
            file_exists(
                public_path('uploads/product/'.$product->image)
            )
        ){

            unlink(
                public_path('uploads/product/'.$product->image)
            );

        }

        $product->delete();

        Alert::success(
            'Berhasil',
            'Produk berhasil dihapus'
        );

        return redirect()->route('admin.product');
    }
}