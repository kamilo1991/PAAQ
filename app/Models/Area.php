<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded =['id','created_at','updated_at'];
    use HasFactory;

    
    //relacion uno amucho inversa
     public function planaquis() {
      return $this->hasMany('App\Models\Planaqui');
    } 
     //relacion uno a mucho inversa
    public function dependencia() {
      return $this->belongsTo('App\Models\Dependencia');
    }
}
