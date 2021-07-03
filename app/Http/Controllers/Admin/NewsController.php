<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index(): View
    {
        return view('admin.pages.news.index', [
            'news' => News::orderBy('created_at', 'DESC')->get()
        ]);
    }


    public function create(): view
    {
        return view('admin.pages.news.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:150|unique:news,title',
            'featured_image' => 'required|image',
            'description' => 'required',
            'body'       => 'required',
        ]);

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'featured_image' => $this->fileUpload('images/', $request->file('featured_image')),
            'description' => $request->description,
            'body' => $request->body,
        ]);

        return back()
            ->with('message', 'News added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    public function edit(News $news): View
    {
        return view('admin.pages.news.edit', [
            'news' => $news
        ]);
    }


    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:150|unique:news,title,' . $news->id,
            'featured_image' => 'nullable|image',
            'description' => 'required',
            'body'       => 'required',
            'status' => 'required'
        ]);

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'featured_image' => $request->file('featured_image') ?
                $this->fileUpload('images/', $request->file('featured_image')) :
                $news->featured_image,
            'description' => $request->description,
            'body' => $request->body,
            'status' => $request->status
        ]);

        return back()
            ->with('message', 'News updated successfully');
    }


    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return back()
            ->with('message', 'News removed successfully');
    }
}
