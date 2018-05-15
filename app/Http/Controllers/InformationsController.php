<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Informations;
class InformationsController extends Controller
{
    public function index()
    {
        $informations = Informations::paginate(5);
        return view('admin.informations.informations', compact('informations'));
    }
	
    public function indexForAdmin()
    {
        $informations = informations::paginate(10);
        return view('admin.informations.admininformations', compact('informations'));
    }
    
	public function newInformation(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('file')) {
                $data['file'] = $this->saveUploadFile($request);
            } else {
                $data['file'] = 'no photo';
            }
            Informations::create($data);
            return redirect()->route('informations');
        }
        return view('admin.informations.newinformation');
    }
	
	public function editInformation(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('file')) {
                $data['file'] = $this->saveUploadFile($request);
                $file = Informations::find($id)->file;
                unlink(public_path() . '/file/' . $file);
            }
            $one = Informations::find($id);
            $one->fill($data);
            $one->save();
            return redirect()->route('informations');
        } else {
            $informations = Informations::find($id);
            if (!$informations) {
                return view('404');
            }
            return view('admin.informations.edit', ['informations' => $informations]);
        }
    }
	
	public function deleteInformation($id)
    {
        $informations = Informations::find($id);
        $file = $informations->file;
        unlink(public_path() . '/file/' . $file);
        $informations->delete();
        return redirect()->route('informations');
    }
	
	public function saveUploadFile($data)
    {
        $file = $data->file('file');
        $newfilename = md5(time() . rand(0, 100)) . "." . $file->extension();
        $file->move(public_path() . '/file', $newfilename);
        return $newfilename;
    }
}