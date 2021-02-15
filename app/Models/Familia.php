<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $guarded =['id','created_at','updated_at'];
    use HasFactory;
    
    public function clases() {
        return $this->hasMany('App\Models\Clase');
    }
    public function segmento() {
        return $this->belongsTo('App\Models\Segmento');
    }
}
