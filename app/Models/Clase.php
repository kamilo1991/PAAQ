<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{protected $guarded =['id','created_at','updated_at'];
    use HasFactory;
    
     //relacion uno a mucho inversa
    public function productos() {
        return $this->hasMany('App\Models\Producto');
    }
     //relacion uno a mucho inversa
    public function familia() {
        return $this->belongsTo('App\Models\Familia');
    }
}
