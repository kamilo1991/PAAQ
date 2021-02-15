<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $fillable= ['nomdependencia','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    //relacion uno a mucho inversa
    public function areas() {
        return $this->hasMany('App\Models\Area');
      }
}
