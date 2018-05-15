<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Informations extends Model
{
    protected $table = 'helpful_informations';
    protected $fillable = ['tittle', 'article', 'file', 'created_at', 'updated_at'];
}