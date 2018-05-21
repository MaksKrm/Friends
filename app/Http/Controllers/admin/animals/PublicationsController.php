<?php

namespace App\Http\Controllers\admin\animals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Http\Requests\AnimalsRequest;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('published', null)->get();
        $activ = Animal::where('published', 1)->count();
        return view('admin/animals/publication/index', ['animals' => $animals, 'activ' => $activ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        return view('admin/animals/publication/show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal=Animal::find($id);
        $animal->published=1;
        $animal->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);
    }
}
