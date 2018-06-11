<?php

namespace App\Http\Controllers\Admin\Goods;

use Illuminate\Http\Request;
use App\Http\Requests\GoodsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Good;
use App\Http\Controllers\Controller;

class AdminGoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Good::paginate(10);
        return view('admin.goods.index', ['goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request)
    {
        $data = $request->all();
        $data['photo'] = basename($request->file('photo')->store('public'));
        Good::create($data);
        return redirect()->route('admin.goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $good = Good::find($id);
        return view('admin/goods/show', ['good' => $good]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good = Good::find($id);
        return view('admin.goods.edit', ['good' => $good]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsRequest $request, $id)
    {
        $data = $request->all();
        $data['photo'] = basename($request->file('photo')->store('public'));
        $good = Good::findOrFail($id);
        $good = Good::find($id)->update($data);
        return redirect()->route('admin.goods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Good::select(['photo'])->where('id', $id)->first();
        Storage::disk('public')->delete($photo["photo"]);
        Good::destroy($id);
        return redirect()->route('admin.goods.index');
    }
}
