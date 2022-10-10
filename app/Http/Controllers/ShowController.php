<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\analyze;

class ShowController extends Controller
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
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return view('welcome');
        }
        $analyzes = analyze::where('user_id', $user->id)->get()->sortByDesc('created_at');
        if ($analyzes->isEmpty()) {
            return view('welcome');
        }
        return view('show', ['analyzes' => $analyzes, 'title' => 'マイ分析']);
    }

    public function showFavorite(Request $request)
    {
        $user = $request->user();
        $analyzes = $user->favorites->sortByDesc('created_at');

        return view('show', ['analyzes' => $analyzes, 'title' => 'お気に入り']);


    }

    public function showAll()
    {
        $analyzes = analyze::all()->sortByDesc('created_at');

        return view('show', ['analyzes' => $analyzes, 'title' => 'みんなの分析']);
    }
}
