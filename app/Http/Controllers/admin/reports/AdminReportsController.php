<?php

namespace App\Http\Controllers\admin\reports;

use App\Http\Controllers\Controller;
use App\Models\CloudStorage;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Excel;
use File;

class AdminReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = CloudStorage::paginate(5);
        return view('admin/reports/index', ['files' => $files]);
    }

    /**
     * Show the form for creating.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * add report to google disk.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request, [
                'file_name' => 'required',
                'message' => 'required',
            ]);
            if (!empty($request->file_name)) {
                $data = basename($request->file_name->store('public'));
                $path = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
                $fileData = File::get($path . $data);
                $request->file_name = $data;
                Storage::cloud()->put($data, $fileData);
                $post = new CloudStorage();
                $post->file_name = $data;
                $post->message = $request->message;
                $post->save();
                Storage::disk('public')->delete($data);
                return redirect('/admin/reports');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = CloudStorage::find($id);
        return view('admin.reports.show', ['files' => $files]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove report from google disk.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = CloudStorage::find($id);
        $filename = $file->file_name;
        $dir = '/';
        $recursive = false;
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
        Storage::cloud()->delete($file['path']);
        CloudStorage::destroy($id);
        return redirect()->route('reports.index');
    }

    /**
     * add reports from excel file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        $this->validate($request, [
            'excel' => 'required|mimes:xls,xlsx',
        ]);
        $path = $request->excel->getRealPath();
        $data = Excel::load($path, function ($reader) {
        })->get();
        if (!empty($data) && $data->count()) {
            $period = null;
            foreach ($data as $key => $value) {
                if ($value->expense == '') {
                    break;
                }
                if (!empty($value->accounting_period)) {
                    $period = date('Y-m-d', strtotime($value->accounting_period));
                }
                $set = Report::where('accounting_period', $period)->get();
                if ($set->isEmpty()) {

                    $insert[] = [
                        'accounting_period' => $period,
                        'income' => $value->income,
                        'income_val' => $value->income_val,
                        'expense' => $value->expense,
                        'expense_val' => $value->expense_val,
                    ];
                }
            else Session::flash('error', 'Отчет за данный период уже существует');
            }
            if (!empty($insert)) {
                DB::table('reports')->insert($insert);
                Session::flash('success', 'Данные успешно добавленны');
                return back();
            }
        }
        return back();
    }
}

