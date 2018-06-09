<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overseer extends Model
{
    protected $table='overseers';
    protected $fillable=['id', 'name', 'age', 'sex', 'contacts', 'notes', 'animal_id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}