<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthenticationController extends Controller
{
    public function index() {
        if (auth()->check()) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user)
        {
            if (Hash::check($password, $user->password)) {
                auth()->login($user);
                return redirect('/admin/dashboard?tehsil=6&province=1');
            } else {
                return redirect('/admin/login')->with('error', 'Invalid login credentials.');
            }
        }
        else
        {
            return redirect('/admin/login')->with('error', 'Invalid login credentials.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'You have been logged out.');
    }
}
