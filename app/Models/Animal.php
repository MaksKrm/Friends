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

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
