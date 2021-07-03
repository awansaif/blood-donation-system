<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\City;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(): View
    {
        return view('donor.pages.profile.index', [
            'groups' => BloodGroup::orderBy('name', 'ASC')->get(),
            'cities' => City::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:donors,email,' . $id,
            'mobile' => 'required|unique:donors,mobile,' . $id,
            'group' => 'required',
            'dob' => 'required|date',
            'city' => 'required',
            'donor' => 'required',
            'status' => 'required'
        ]);

        // dd($request->all());

        // dd($id);
        $donor = Donor::find($id);

        $donor->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'blood_group' => $request->group,
            'dob' => $request->dob,
            'city' => $request->city,
            'is_donor' => $request->donor,
            'status' => $request->status,
            'avatar' => $request->file('avatar') ? $this->fileUpload('images/', $request->file('avatar')) : $donor->avatar
        ]);

        return back()
            ->with('message', $request->name . ' information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }


    public function fileUpload($destionation, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destionation, $file_name);
        return $destionation . $file_name;
    }
}
