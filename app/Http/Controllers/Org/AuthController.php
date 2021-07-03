<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'registration_number' => 'required|exists:organizations,registration_number',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('org')->attempt([
            'registration_number' => $request->registration_number,
            'password'            => $request->password,
            'status'              => '1'
        ])) {
            return redirect()
                ->route('org.dashboard');
        }
        return back()
            ->with('message', 'Invalid password! Try again')
            ->withInput([
                'registration_number' => $request->registration_number
            ]);
    }

    public function dashboard()
    {
        return view('organization.dashboard');
    }

    public function logout()
    {
        Auth::guard('org')->logout();
        return redirect()
            ->route('org.showLoginForm');
    }
}
