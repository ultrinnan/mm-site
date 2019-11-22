<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $greetings = 'Say hello friend and come in';
        return view('admin/index', [
            'greetings' => $greetings,
        ]);
    }
}
