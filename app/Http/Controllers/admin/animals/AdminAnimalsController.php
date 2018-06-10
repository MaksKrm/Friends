<?php

namespace App\Http\Controllers\admin\animals;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalsRequest;
use App\Http\Requests\UpdateAnimalsRequest;
use App\Models\Animal;
use App\Models\Image;
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
     * @param Image $image
     * @return void
     */
    public function store(AnimalsRequest $request, Animal $model, Image $image)
    {
        $model->main_foto = $image->saveLocalFoto($request->file('main_foto'));
        $model->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $model->save();
        if (!empty($request['files_'])) {
            foreach ($request->files_ as $foto) {
                $other_path = $image->saveLocalFoto($foto);
                $image->insert([
                    'name' => $other_path,
                    'animal_id' => $model['id'],
                ]);
            }
        }
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
     * @param $id
     * @param Animal $model
     * @param Image $image
     * @return void
     */
    public function update(UpdateAnimalsRequest $request, $id, Animal $model, Image $image)
    {
        dd(1);
        $animal=$model->find($id);
        if (!empty($request['files_'])) {
            foreach ($request->files_ as $foto) {
                $other_path = $image->saveLocalFoto($foto);
                $image->insert([
                    'name' => $other_path,
                    'animal_id' => $model['id'],
                ]);
            }
        }
        if (!empty($request['main_foto'])){
            $animal->main_foto = $image->saveLocalFoto($request['main_foto']);
        }
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
