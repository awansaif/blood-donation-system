<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Donor;
use App\Models\News;
use App\Models\Organization;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPagesController extends Controller
{
    public function about(): View
    {
        return view('pages.about.index', [
            'about' => AboutPage::first(),
            'team' => Team::orderBy('name', 'ASC')->get()
        ]);
    }
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
    public function donors(): View
    {
        return view('pages.donor.index', [
            'donors' => Donor::where('status', 1)
                ->where('is_donor', 1)
                ->get()
        ]);
    }
    public function contact(): View
    {
        return view('pages.contact.index');
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
