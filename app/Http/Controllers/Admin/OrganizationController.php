<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.organization.index', [
            'organizations' => Organization::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.organization.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'registration_number' => 'required|unique:organizations,registration_number',
            'logo' => 'required|image',
            'address' => 'required',
            'email' => 'required|email|unique:organizations,email',
            'mobile' => 'required|unique:organizations,mobile',
            'Password' => 'required|min:8'
        ]);


        Organization::create([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
            'logo' => $this->fileUpload('images/', $request->file('logo')),
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->Password),
            'status' => 1
        ]);

        return back()
            ->with('message', 'Organization added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }


    public function edit(Organization $organization): View
    {
        return view('admin.pages.organization.edit', [
            'org' => $organization
        ]);
    }


    public function update(Request $request, Organization $organization): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'registration_number' => 'required|unique:organizations,registration_number,' . $organization->id,
            'logo' => 'nullable|image',
            'address' => 'required',
            'email' => 'required|email|unique:organizations,email,' . $organization->id,
            'mobile' => 'required|unique:organizations,mobile,' . $organization->id,
            'Password' => 'nullable|min:8'
        ]);


        $organization->update([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
            'logo' => $request->file('logo') ? $this->fileUpload('images/', $request->file('logo')) : $organization->logo,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->Password ? Hash::make($request->Password) : $organization->password,
            'status' => $request->status
        ]);

        return back()
            ->with('message', 'Organization updated successfully');
    }


    public function destroy(Organization $organization): RedirectResponse
    {
        $organization->delete();
        return back()
            ->with('message', 'Organization removed successfully');
    }
}
