<?php

namespace App\Http\Controllers\admin\animals;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalsRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class AdminAnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('published', 1)->get();
        $expectations = Animal::where('published', null)->get();

        return view('admin/animals/index', ['animals' => $animals, 'expectations' => $expectations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/animals/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnimalsRequest $request
     * @param Animal $model
     * @return void
     */
    public function store(AnimalsRequest $request, Animal $model)
    {
        if (!empty($request['other_foto'])) {
            $other_path = [];
            foreach ($request->other_foto as $foto) {
                $other_path[] = $model->saveLocalFoto($foto);
            }
            $model->other_foto = implode(",", $other_path);
        }
        $model->main_foto = $model->saveLocalFoto($request->file('main_foto'));
        $model->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $model->save();

        return redirect()->route('animals.index');
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

        return view('admin/animals/show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        $others_foto=$animal['other_foto'];
        $others_foto=explode(',' , $others_foto);

        return view('admin/animals/update', ['animal' => $animal, 'others_foto' => $others_foto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Animal $model
     * @return void
     */
    public function update(Request $request, Animal $model)
    {
        $animal=$model->find($request['id']);
        if (!empty($request['other_foto'])) {
            $other_path = [];
            foreach ($request->other_foto as $foto) {
                $other_path[] = $model->saveLocalFoto($foto);
            }
            $animal->other_foto = implode(",", $other_path);
        }
        $animal->main_foto = $model->saveLocalFoto($request['main_foto']);
        $animal->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $animal->save();

        return redirect()->route('animals.index');
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
