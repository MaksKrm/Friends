<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table='animals';
    protected $fillable=['id', 'name', 'species', 'breed', 'sex', 'age', 'notes', 'contacts', 'main_foto', 'other_foto', 'published'];

    /**
     * Save foto
     * @param $foto
     * @return string
     */
    public function saveLocalFoto($foto)
    {
        $file_name = str_random(7) . '_' . time();
        $foto->move(storage_path('app/public'), $file_name);

        return $file_name;
    }
}
