<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{

    public function index(): View
    {
        return view('admin.pages.about.index', [
            'about' => AboutPage::first()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'about' => 'required',
        ]);

        AboutPage::find(1)->update([
            'about' => $request->about
        ]);

        return  back()
            ->with('message', 'About us content updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutPage  $aboutPage
     * @return \Illuminate\Http\Response
     */
    public function show(AboutPage $aboutPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutPage  $aboutPage
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutPage $aboutPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutPage  $aboutPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutPage $aboutPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutPage  $aboutPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutPage $aboutPage)
    {
        //
    }
}
