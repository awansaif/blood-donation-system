<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.team.index', [
            'team' => Team::orderBy('name', 'ASC')->get()
        ]);
    }


    public function create(): View
    {
        return view('admin.pages.team.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'designation' => 'required'
        ]);

        Team::create([
            'name' => $request->name,
            'avatar' => $this->fileUpload('images/', $request->file('image')),
            'designation' => $request->designation
        ]);

        return back()
            ->with('message', 'Team member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }


    public function edit(Team $team): View
    {
        return view('admin.pages.team.edit', [
            'member' => $team
        ]);
    }


    public function update(Request $request, Team $team): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'designation' => 'required'
        ]);

        $team->update([
            'name' => $request->name,
            'avatar' => $request->file('image') ? $this->fileUpload('images/', $request->file('image')) : $team->avatar,
            'designation' => $request->designation
        ]);

        return back()
            ->with('message', 'Team member updated successfully');
    }


    public function destroy(Team $team): RedirectResponse
    {
        $team->delete();
        return back()
            ->with('message', 'Team member removed successfully');
    }
}
