<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
    use HasFactory;
    protected $fillable= ['detfuente','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    //relacion uno a mucho inversa
    public function planaquis() {
        return $this->hasMany('App\Models\Planaqui');
      } 
}
