<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();


//            echo "<pre>";print_r($user);die();
            if ($user->role === 'ADMIN') {
                return redirect()->intended('Admin/dashboard');
            } else {
                return redirect()->intended('User/dashboard');
            }
        }

        return redirect('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        try {
            Session::flush();
            Auth::logout();
//            Session::flush();
            return redirect('login');
        } catch (\ErrorException $e) {
            echo "<pre>";print_r($e->getMessage());die();
        }
    }


}
