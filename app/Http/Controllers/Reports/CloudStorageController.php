<?php

namespace App\Http\Controllers\Reports;

use App\Models\CloudStorage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CloudStorageController extends Controller
{
    public function show()
    {
        $reports=CloudStorage::paginate(5);
        return view('pages.reports.index',['reports'=>$reports]);
    }

    public function loadFromDisk($id)
    {
        $report=CloudStorage::find($id);
        $filename = $report->file_name;
        $dir = '/';
        $recursive = false;
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();
        $rawData = Storage::cloud()->get($file['path']);
        return response($rawData, 200)
            ->header('ContentType', $file['mimetype'])
            ->header('Content-Disposition', "attachment; filename='$filename'");
    }
}
