<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detcodunspsc extends Model
{
  protected $guarded =['id','created_at','updated_at'];
    use HasFactory;
   //relacion uno amucho inversa  

  public function producto() {
   return $this->belongsTo('App\Models\Producto');
 }
 public function planaquis() {
   return $this->hasMany('App\Models\Planaqui');
} 

}



