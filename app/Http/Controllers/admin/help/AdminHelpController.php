<?php

namespace App\Http\Controllers\admin\help;

use App\Http\Requests\AdminHelpFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Constant;

class AdminHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $all= Constant::all();
        return view('admin.help.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.help.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminHelpFormRequest $request)
    {
        $all=$request->all();
        Constant::create($all);
        return redirect('/admin/help');
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

        $help = Constant::find($id);

        return view('admin/help/edit', ['help' => $help]);
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
        $data = $request->all();
        $help = Constant::findOrFail($id);
        $help = Constant::find($id)->update($data);
        return redirect()->route('admin.help.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Constant::destroy($id);
        return redirect()->route('admin.help.index');
    }
}
