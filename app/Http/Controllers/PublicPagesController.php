<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPagesController extends Controller
{
    public function news(): View
    {
        return view('pages.news.index', [
            'news' => News::orderBy('created_at', 'DESC')->where('status', 1)->get()
        ]);
    }

    public function signleNews($slug): View
    {
        return view('pages.news.show', [
            'news' => News::where('slug', $slug)->first()
        ]);
    }

    public function organization(): View
    {
        return view('pages.organization.index', [
            'organizations' => Organization::with('offices')
                ->orderBy('created_at', 'DESC')
                ->where('status', 1)
                ->get()
        ]);
    }
}
