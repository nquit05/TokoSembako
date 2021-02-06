<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function auth(Request $req)
    {
        $user = User::where('username', $req->usr)->first();
        if ($user) {
            if ($req->pass == $user->password) {
                session(['login' => true]);
                return redirect('/dashboard');
            } else {
                return redirect('/login')->with('gagal', 'Email atau Password salah');
            }
        }
        return redirect('/login')->with('gagal', 'Email atau Password salah');
    }

    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/');
    }
}
