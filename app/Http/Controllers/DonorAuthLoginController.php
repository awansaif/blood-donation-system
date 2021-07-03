<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorAuthLoginController extends Controller
{

    public function showLoginForm()
    {
        return view('donor.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'exists:donors,mobile'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::guard('donor')->attempt(['mobile' => $request->mobile, 'password' => $request->password], $request->remember)) {
            return redirect()->route('donor.dashboard');
        } else {
            return back()
                ->withInput([
                    'mobile' => $request->mobile,
                    'remember' => $request->remember
                ])
                ->with(['message' => 'Invalid password. Try Again']);
        }
    }

    public function dashboard()
    {
        return view('donor.dashboard');
    }


    public function logout()
    {
        Auth::guard('donor')->logout();
        return redirect()->route('donor.login');
    }
}
