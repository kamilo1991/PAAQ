<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planaqui extends Model
{
    use HasFactory;
    //relacion uno amucho inversa
     public function area() {
      return $this->belongsTo('App\Models\Area');
    }
    
    public function mes() {
      return $this->belongsTo('App\Models\Mes');
    }

    public function modalidad() {
      return $this->belongsTo('App\Models\Modalidad');
    }

    public function fuente() {
      return $this->belongsTo('App\Models\Fuente');
    }

    public function requivigfut() {
      return $this->belongsTo('App\Models\Requivigfut');
    }

    public function estsolivigen() {
      return $this->belongsTo('App\Models\Estsolivigen');
    }

    public function tipozona() {
      return $this->belongsTo('App\Models\Tipozona');
    }

    public function tipoaquicont() {
      return $this->belongsTo('App\Models\Tipoaquicont');
    }

    public function tipoprocesocont() {
      return $this->belongsTo('App\Models\Tipoprocesocont');
    }
    public function detcodunspsc() {
      return $this->belongsTo('App\Models\Detcodunspsc');
    }

    public function tipoprioridad() {
      return $this->belongsTo('App\Models\Tipoprioridad');
    }
}