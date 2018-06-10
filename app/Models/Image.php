<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';
    protected $fillable=['id', 'name', 'animal_id'];

    public function saveLocalFoto($foto)
    {
        if(is_string($foto)){
            return $foto;
        }
        $file_name = str_random(7) . '_' . time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(storage_path('app/public'), $file_name);

        return $file_name;
    }

    public function getFotoAnimals($id, Image $image)
    {
        $others_foto=[];
        $others_foto=$image->where('animal_id', $id)->get();

        return $others_foto;
    }

    public function animals()
    {
        return $this->belongsTo('App\Models\Animal');
    }
}
