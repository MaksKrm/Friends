<?php

namespace App\Http\Controllers\Informations;

use Illuminate\Http\Request;
use App\Http\Requests\InformationsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Helpful_information;
use App\Http\Controllers\Controller;

class Helpful_informationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helpful_informations = Helpful_information::all();
		return view('admin.helpful_informations.index', compact('helpful_informations', $helpful_informations));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {	
        return view('admin.helpful_informations.create');
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
		helpful_information::create($data);
        return redirect('helpful_informations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(helpful_information $helpful_information)
    {
        return view('admin.helpful_informations.show',compact('helpful_information',$helpful_information));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, helpful_information $helpful_information)
    {
        return view('admin.helpful_informations.edit',compact('helpful_information',$helpful_information));
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
        $data['file'] = basename($request->file('file')->store('public'));
        $helpful_information = helpful_information::findOrFail($id);
        $helpful_information = helpful_information::find($id)->update($data);
        return redirect('helpful_informations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, helpful_information $helpful_information)
    {
        $helpful_information->delete();
        $request->session()->flash('message', 'Информация удалена!');
        return redirect('helpful_informations');
    }
	
}

