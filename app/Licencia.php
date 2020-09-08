<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
  protected $fillable = [

      'rut','nro_licencia','fecha_desde','fecha_hasta','dias','estado'
  ];
  public function url(){
   return $this->id ? 'licencia.update' : 'licencia.store';

  }
   public function method(){
       return $this->id ? 'PUT' : 'POST';
  }
}
