<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $table= "plataformas";
    protected $fillable=['nombre_plataforma'];
}
