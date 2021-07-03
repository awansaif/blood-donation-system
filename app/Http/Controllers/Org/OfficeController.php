<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use App\Models\OrganizationOffice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OfficeController extends Controller
{
    public function index(): View
    {
        return view('organization.pages.office.index', [
            'offices' => OrganizationOffice::where('organization_id', Auth::guard('org')->id())->orderBy('id', 'DESC')->get()
        ]);
    }


    public function create(): View
    {
        return view('organization.pages.office.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'address' => 'required',
            'email'   => 'required|unique:organization_offices,email',
            'mobile'  => 'required|unique:organization_offices,mobile',
            'head'    => 'required',
            'city'    => 'required'
        ]);

        OrganizationOffice::create([
            'organization_id' => Auth::guard('org')->id(),
            'address' => $request->address,
            'email'   => $request->email,
            'mobile'  => $request->mobile,
            'head'    => $request->head,
            'city'    => $request->city
        ]);

        return back()
            ->with('message', 'New Office save successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationOffice  $organizationOffice
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationOffice $organizationOffice)
    {
        //
    }


    public function edit($id): View
    {
        $organizationOffice = OrganizationOffice::find($id);
        return view('organization.pages.office.edit', [
            'office' => $organizationOffice
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $organizationOffice = OrganizationOffice::find($id);
        $request->validate([
            'address' => 'required',
            'email'   => 'required|unique:organization_offices,email,' . $id,
            'mobile'  => 'required|unique:organization_offices,mobile,' . $id,
            'head'    => 'required',
            'city'    => 'required'
        ]);

        $organizationOffice->update([
            'organization_id' => Auth::guard('org')->id(),
            'address' => $request->address,
            'email'   => $request->email,
            'mobile'  => $request->mobile,
            'head'    => $request->head,
            'city'    => $request->city
        ]);

        return back()
            ->with('message', 'Office updated successfuly.');
    }


    public function destroy($id): RedirectResponse
    {
        $organizationOffice = OrganizationOffice::find($id);
        $organizationOffice->delete();
        return back()
            ->with('message', 'Office removed successfuly.');
    }
}
