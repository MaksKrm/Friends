<?php

namespace App\Http\Controllers\Admin\Informations;

use Illuminate\Http\Request;
use App\Http\Requests\InformationsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Information;
use App\Http\Controllers\Controller;

class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::paginate(10);
		return view('admin.informations.index', ['informations' => $informations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformationsRequest $request)
    {
		$data = $request->all();
        $data['file'] = basename($request->file('file')->store('public'));
		information::create($data);
        return redirect()->route('admin.informations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = information::find($id);
        return view('admin.informations.show', ['information' => $information]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = information::find($id);
        return view('admin.informations.edit', ['information' => $information]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InformationsRequest $request, $id)
    {
        $data = $request->all();
        if (!empty($request['file'])){
            $file = information::select(['file'])->where('id', $id)->first();
            Storage::disk('public')->delete($file["file"]);
            $data['file'] = basename($request->file('file')->store('public'));
        }
        $information = information::findOrFail($id);
        $information = information::find($id)->update($data);
        return redirect()->route('admin.informations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$file = information::select(['file'])->where('id', $id)->first();
        Storage::disk('public')->delete($file["file"]);
        information::destroy($id);
        return redirect()->route('admin.informations.index');
    }

}
