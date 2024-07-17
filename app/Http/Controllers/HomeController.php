<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $weburl = [
            'google' => 'http://www.google.com'
        ];
        return view('home', compact('weburl'));
    }
    public function about()
    {
        return view('about_us');
    }
}
