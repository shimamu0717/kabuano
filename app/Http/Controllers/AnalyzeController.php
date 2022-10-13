<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\analyze;

class AnalyzeController extends Controller
{
    public function __construct() {
        $this->authorizeResource(analyze::class, 'analyze');
    }
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
        $request->validate([
            'code' => 'required | numeric',
            'start_date' => 'required | date | before_or_equal:today |  before_or_equal:end_date',
            'end_date' => 'required | date | before_or_equal:today | after_or_equal:start_date',
	]);

	$path = app_path() . "/python/test.py";
        $code = $request->code;
        $star_date = $request->start_date;
        $start_open_or_close = $request->start_open_or_close;
        $end_date = $request->end_date;
        $end_open_or_close = $request->end_open_or_close;
        $command =  "/usr/bin/python3 " . $path . " $code" . " $star_date" . " $start_open_or_close" . " $end_date" . " $end_open_or_close";
	exec($command, $output);

        if (empty($output)){
            return back()->withInput()->with('no_data', '銘柄コード、日付を正しく入力してください');
        }
        $result = [
            'start_price' => $output[0] ,
            'end_price' => $output[1] ,
            'yield' => $output[2] ,
            'yield_ratio' => $output[3] ,
            'high' => $output[4] ,
            'low' => $output[5] ,
        ];
        $inputs = $request->except('_token');

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
    public function update(Request $request, analyze $analyze)
    {
        $analyze->fill($request->all())->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(analyze $analyze)
    {
        $analyze->delete();
        return redirect()->route('home');
    }

    public function favorite(Request $request, analyze $analyze)
    {
        $analyze->favorites()->detach($request->user()->id);
        $analyze->favorites()->attach($request->user()->id);

        return[
            'id' => $analyze->id,
        ];
    }

    public function unfavorite(Request $request, analyze $analyze)
    {
        $analyze->favorites()->detach($request->user()->id);

        return[
            'id' => $analyze->id,
        ];
    }
}
