<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->verify === 0) {
                Auth::logout();
                return back()->with('loginError', 'Silahkan hubungi administrator untuk aktivasi akun anda agar bisa masuk');
            }
            return redirect()->intended('/admin');
        }


        return back()->with('loginError', 'Gagal Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/');
    }
    public function verify(Request $request, User $user)
    {

        $user = User::find($request)->first();
        if ($user) {
            $user->verify = '1';
            $user->save();
        }

        return redirect('/dashboard/pelanggan');
    }
    public function block(Request $request)
    {

        $user = User::find($request)->first();
        if ($user) {
            $user->verify = '0';
            $user->save();
        }

        return redirect('/dashboard/pelanggan');
    }
}
