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

    public function index(Request $request)
    {
        $helps = Constant::paginate(5);
        if ($request->ajax()) {
            return view('admin.help.load', ['helps' => $helps])->render();
        }
        return view('admin.help.index',['helps'=>$helps]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminHelpFormRequest $request)
    {
        $all = $request->all();
        Constant::create($all);
        return redirect('/admin/help');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $help = Constant::find($id);
        return view('admin/help/show', ['help' => $help]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = Constant::find($id);
        return view('admin.help.edit', ['help' => $help]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminHelpFormRequest $request, $id)
    {
        $data = $request->all();
        $help = Constant::find($id)->update($data);
        return redirect()->route('help.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Constant::destroy($id);
        return redirect()->route('help.index');
    }
}
