<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\City;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorAuthRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('donor.auth.register', [
            'groups' => BloodGroup::orderBy('name', 'ASC')->get(),
            'cities' => City::orderBy('name', 'ASC')->get()
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:donors'],
            'mobile' => ['required', 'unique:donors'],
            'blood_group' => ['required'],
            'gender' => ['required'],
            'dob'    => ['required'],
            'city'   => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $donor = Donor::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'dob'    => $request->dob,
            'city'   => $request->city,
            'password' => Hash::make($request->password),
            'avatar'   => 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name=' . $request->name
        ]);

        Auth::guard('donor')->login($donor);

        return redirect()->route('donor.dashboard');
    }
}
