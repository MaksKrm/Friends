<?php

namespace App\Http\Controllers\admin\animals;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalsRequest;
use App\Http\Requests\UpdateAnimalsRequest;
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
        $animals = Animal::where('published', 1)->paginate(10);
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
        if (!empty($request['files_'])) {
            $other_path = [];
            foreach ($request->files_ as $foto) {
                $other_path[] = $model->saveLocalFoto($foto);
            }
            $model->other_foto = implode(",", $other_path);
        }
        $model->main_foto = $model->saveLocalFoto($request->file('main_foto'));
        $model->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $model->save();
        $responseJson = [ 'status'=>'ok'] ;
        $response = json_encode($responseJson);

        return $response;
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
     * @param UpdateAnimalsRequest $request
     * @param Animal $model
     * @return void
     */
    public function update(UpdateAnimalsRequest $request, Animal $model)
    {
        dd($request->name);
        $animal=$model->find($request['id']);
        dd($animal);
        if (!empty($request['files_'])) {
            $other_path = [];
            foreach ($request->files_ as $foto) {
                $other_path[] = $model->saveLocalFoto($foto);
            }
            $animal->other_foto = implode(",", $other_path);
        }
        $animal->main_foto = $model->saveLocalFoto($request['main_foto']);
        $animal->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $animal->save();
        $responseJson = [ 'status'=>'ok'] ;
        $response = json_encode($responseJson);

        return $response;
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
