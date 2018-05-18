<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helpful_information extends Model
{
	protected $fillable = ['tittle', 'article', 'file', 'created_at', 'updated_at'];
}
