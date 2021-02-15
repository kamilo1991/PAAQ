<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable= ['detsegmento','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    public function familias() {
        return $this->hasMany('App\Models\Familia');
    }
}
