<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        return view('home');
    }

    public function out () {
        auth()->logout();
        return back();
    }

    public function about () {
        return view('about');
    }
}
