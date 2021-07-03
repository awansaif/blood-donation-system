<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()
                ->withInput(['email' => $request->email])
                ->with(['message' => 'Incorrect password. Please try again']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.showLoginForm');
    }
}
