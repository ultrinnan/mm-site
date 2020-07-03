<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('general/page', [
            'page' => $page,
        ]);
    }
}
