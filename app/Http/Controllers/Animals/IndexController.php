<?php

namespace App\Http\Controllers\Animals;

use App\Http\Requests\AnimalsRequest;
use App\Http\Requests\MailRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('published', 1)->orderBy('id', 'desc')->paginate(10);
        return view('pages.animals.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/animals/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnimalsRequest $request
     * @param Animal $model
     * @param Image $image
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalsRequest $request, Animal $animal, Image $image)
    {
        if (!empty($request['files_'])) {
            $other_path = [];
            foreach ($request->files_ as $foto) {
                $other_path[] = $image->saveLocalFoto($foto);
            }
            $image->name = implode(",", $other_path);
        }
        $animal->main_foto = $image->saveLocalFoto($request->file('main_foto'));
        $animal->fill($request->only('name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts'));
        $animal->save();
        $responseJson = [ 'status'=>'ok'] ;
        $response = json_encode($responseJson);

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('pages.animals.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $category)
    {

        switch ($category) {
            case "tomcats":
                $animals = Animal::where('published', 1)->where('species', 1)->where('sex', 1)->orderBy('id', 'desc')->paginate(10);
                break;
            case "dogs":
                $animals = Animal::where('published', 1)->where('species', 2)->where('sex', 1)->orderBy('id', 'desc')->paginate(10);
                break;
            case "cats":
                $animals = Animal::where('published', 1)->where('species', 1)->where('sex', 2)->orderBy('age', 'desc')->paginate(10);
                break;
            case "female-dogs":
                $animals = Animal::where('published', 1)->where('species', 2)->where('sex', 2)->orderBy('age', 'desc')->paginate(10);
                break;
            default:
                $animals = Animal::where('published', 1)->orderBy('id', 'desc')->paginate(10);
                break;
        }

        if ($request->ajax()) {
            return view('pages.animals.load', compact('animals'));
        }
        return view('pages.animals.index', compact('animals'));

    }

    /**
     * @param MailRequest $request
     * @return array
     */
    public function send(MailRequest $request)
    {
        Mail::send('pages.animals.mail', ['request' => $request], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('maliyaa@vesco.com.ua');
            $message->subject($request->message);
        });
        $response = [ 'status'=>'ok'] ;


        return $response;
    }

    /**
     * @return void
     */
    public function showFormEmail()
    {
        return view('pages.animals.questionnaire');
    }

    /**
     * @param $id
     * @return void
     */
    public function showContactForm($id)
    {
        $animal = Animal::find($id);
        return view('pages.animals.contacts', ['animal' => $animal]);
    }


}
