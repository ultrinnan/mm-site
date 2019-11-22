<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog/index');
    }

    public function view($slug)
    {
        $post = \DB::table('posts')->where('slug', $slug)->first();


        return view('blog/view', [
            'post' => $post,
        ]);
    }
}
