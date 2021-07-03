<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        return view('organization.pages.setting.index');
    }


    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
        ]);

        $organization = Organization::find($id);
        if (Hash::check($request->current_password, Auth::guard('org')->user()->password)) {
            $organization->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()
                ->with('message', 'New password set successfully');
        }
        return back()
            ->with('message', 'Current password mismatched. Please Try again');
    }
}
