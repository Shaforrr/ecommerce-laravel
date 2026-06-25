<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Halaman Login
    public function index()
    {
        return view('welcome');
    }

    // Proses Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua email dan password terisi dengan benar!');
            return redirect()->back();
        }

        // Login Admin
      
if (Auth::guard('admin')->attempt([
    'email' => $request->email,
    'password' => $request->password
])) {

    toast('Selamat datang admin!', 'success');
    return redirect()->route('admin.dashboard');
}

        // Login User
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            toast('Selamat datang!', 'success');
            return redirect()->route('user.dashboard');
        }

        Alert::error('Login Gagal!', 'Email atau password tidak valid!');
        return redirect()->back();
    }

    // ==========================
    // HALAMAN REGISTER
    // ==========================

    public function register()
    {
        return view('register');
    }

    // ==========================
    // PROSES REGISTER
    // ==========================

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua data terisi dengan benar.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'point' => 10000,
        ]);

        Alert::success('Berhasil!', 'Registrasi berhasil, silakan login.');

        return redirect('/');
    }

    // Logout Admin
    public function admin_logout()
    {
        Auth::guard('admin')->logout();

        toast('Berhasil logout!', 'success');

        return redirect('/');
    }

    // Logout User
    public function user_logout()
    {
        Auth::logout();

        toast('Berhasil logout!', 'success');

        return redirect('/');
    }
}