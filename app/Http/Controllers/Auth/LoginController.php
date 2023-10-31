<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->level == 1) {
            return redirect()->route('admin');
        } elseif ($user->level == 2) {
            return redirect()->route('home');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect('login')->withErrors([
                'email' => 'Email tidak ditemukan'
            ]);
        }

        if (Auth::attempt($credentials)) {
            if ($user->level == 1) {
                return redirect()->route('admin');
            } elseif ($user->level == 2) {
                return redirect()->route('user');
            }
        }

        return redirect('login')->withErrors([
            'password' => 'Password salah'
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/login');
   }
}