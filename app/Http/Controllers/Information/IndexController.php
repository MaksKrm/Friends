<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Good;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*        if ($request->ajax()) {
            return view('pages.reports.load', ['reports' => $reports])->render();
        }
        $now=date('Y-m');
        $all=Report::where('accounting_period','like','%'.$now.'%')->get();
        $mounths=Report::select('accounting_period')->get();
        return view('pages.reports.index',['all'=>$all,'reports'=>$reports,'mounths'=>$mounths]);*/

        $information = Information::orderBy('id', 'desc')->paginate(8);
        $goods = Good::orderBy('id', 'desc')
            ->take(8)
            ->get();
        return view('pages.information.index', ['information' => $information, 'goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Information::find($id);
        return view('pages.information.show', ['article' => $article]);
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
