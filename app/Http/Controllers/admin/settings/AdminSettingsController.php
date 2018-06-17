<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Requests\AdminSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use App\Models\Image;
use App\Http\Controllers\Controller;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id')->take(2)->get();
        $keyed = $contacts->keyBy('id');
        $keyed->all();
        $logo = Image::where('animal_id', '=', 99999)->first();
        return view('admin.settings.index', ['logo' => $logo, 'contacts' => $keyed]);
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
    public function store(AdminSettingsRequest $request)
    {
        if ($request['phone']) {
            Contact::create($request->all());
        } else {
            $data = $request->all();
            $data['name'] = basename($request->file('name')->store('public'));
            Image::create($data);
        }
        return redirect()->route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminSettingsRequest $request, $id)
    {
        if ($id == 1 || $id == 2) {
            $contact = Contact::find($id)->update($request->all());
        } else {
            $data = $request->all();
            $file = Image::select(['name'])->where('id', $id)->first();
            Storage::disk('public')->delete($file["name"]);
            $data['name'] = basename($request->file('name')->store('public'));
            $image = Image::find($id)->update($data);
        }

        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Image::select(['name'])->where('id', $id)->first();
        Storage::disk('public')->delete($file["name"]);
        Image::destroy($id);
        return redirect()->route('admin.settings.index');
    }
}
