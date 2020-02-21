<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table="juegos";
    protected $primaryKey = 'id_juego';
    protected $fillable=['nombre_juego',' precio_juego','stock_juego','url_juego'];
}
