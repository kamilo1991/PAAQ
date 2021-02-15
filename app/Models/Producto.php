<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $guarded =['id','created_at','updated_at'];
    use HasFactory;

    public function detcodunspscs() {
        return $this->hasMany('App\Models\Detcodunspsc');
    }

    public function clase() {
        return $this->belongsTo('App\Models\Clase');
    }
}
