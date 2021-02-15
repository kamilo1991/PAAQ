<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoprioridad extends Model
{
    use HasFactory;
    protected $fillable= ['detprioridad','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
  //relacion uno amucho inversa
  public function planaquis() {
    return $this->hasMany('App\Models\Planaqui');
  } 
  
}
