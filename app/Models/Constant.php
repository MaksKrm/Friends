<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    public $timestamps = false;

    protected $fillable = array('help', 'contact', 'message');
}
