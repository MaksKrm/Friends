<?php

namespace App\Http\Controllers\Animals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;

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
        return view('pages.animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('pages.animal.show', ['animal' => $animal]);
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
            case "cats":
                $animals = Animal::where('published', 1)->where('species', 1)->orderBy('id', 'desc')->paginate(10);
                break;
            case "dogs":
                $animals = Animal::where('published', 1)->where('species', 2)->orderBy('id', 'desc')->paginate(10);
                break;
            case "boys":
                $animals = Animal::where('published', 1)->where('sex', 1)->orderBy('age', 'desc')->paginate(10);
                break;
            case "girls":
                $animals = Animal::where('published', 1)->where('sex', 2)->orderBy('age', 'desc')->paginate(10);
                break;
            default:
                $animals = Animal::where('published', 1)->orderBy('id', 'desc')->paginate(10);
                break;
        }

        if ($request->ajax()) {
            return view('pages.animal.load', compact('animals'));
        }
        return view('pages.animal.index', compact('animals'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
