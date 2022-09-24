<?php

namespace App\Http\Controllers;

use App\Models\analyze;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $analyzes = analyze::all()->sortByDesc('created_at');
        return view('home', ['analyzes' => $analyzes]);
    }
}
