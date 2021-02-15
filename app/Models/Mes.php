<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $fillable= ['nommes','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    use HasFactory;
     //relacion uno amucho inversa
     public function planaquis() {
        return $this->hasMany('App\Models\Planaqui');
    } 
  
}
