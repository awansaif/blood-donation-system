<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use Faker\Core\Blood;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.bloodgroup.index', [
            'groups' => BloodGroup::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.bloodgroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        BloodGroup::create([
            'name' => $request->name
        ]);

        return back()
            ->with(
                'message',
                'Blood group added successfully.'
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BloodGroup $bloodGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.bloodgroup.edit', [
            'group' => BloodGroup::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = BloodGroup::find($id);
        $request->validate([
            'name' => 'required|unique:blood_groups,name,' . $id
        ]);

        $group->update([
            'name' => $request->name
        ]);

        return back()
            ->with('message', 'Blood Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = BloodGroup::find($id);
        $group->delete();
        return back()
            ->with('message', 'Blood Group removed successfully');
    }
}
