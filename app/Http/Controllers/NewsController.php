<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news/index');
    }

    public function view($slug)
    {
        $singleNews = News::where('slug', $slug)->firstOrFail();

        return view('news/view', [
            'singleNews' => $singleNews,
        ]);
    }
}
