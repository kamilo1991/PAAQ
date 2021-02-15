<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requivigfut extends Model
{
    use HasFactory;
    protected $fillable= ['detvigfut','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    
 //relacion uno amucho inversa
 public function planaquis() {
    return $this->hasMany('App\Models\Planaqui');
  } 
   
}
