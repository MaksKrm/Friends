<?php

namespace App\Http\Controllers\admin\animals;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy($id)
    {
        $file = Image::find($id);
        Storage::disk('public')->delete($file["name"]);
        Image::destroy($id);
    }
}
