<?php

namespace App\Http\Controllers\admin\animals;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('published', null)->paginate(10);
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
        $files = Image::where('animal_id',$id)->get();
        foreach ($files as $file) {
            Storage::disk('public')->delete($file["name"]);
        }
        $animal = Animal::find($id);
        Storage::disk('public')->delete($animal["main_foto"]);
        Animal::destroy($id);
    }
}
