<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoaquicont extends Model
{
    use HasFactory;
    protected $fillable= ['dettipoaquicont','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
   //relacion uno amucho inversa
   public function planaquis() {
    return $this->hasMany('App\Models\Planaqui');
  } 
}
