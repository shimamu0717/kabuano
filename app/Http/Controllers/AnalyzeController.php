<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\analyze;

class AnalyzeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('analyze.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analyze.create');
    }

    public function start(Request $request)
    {
        $path = app_path() . "/python/test.py";
        // $command =  "python3 " . $path;
        $command =  "python3 -m pip -V" ;
        exec($command, $output);
        dd($output);
        $inputs = $request->except('_token');
        $result = [
            'company' => 'hoge',
            'start_price' => 100,
            'end_price' => 110 ,
            'high' => 120 ,
            'low' => 90 ,
            'yield' => 10 ,
            'yield_ratio' => 10
        ];

        $request->session()->put($inputs);
        $request->session()->put($result);

        return view('analyze.result');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, analyze $analyze)
    {
        $analyze->fill($request->session()->all());
        $analyze->user_id = $request->user()->id;
        $analyze->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
