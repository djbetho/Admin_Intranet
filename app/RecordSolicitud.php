<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordSolicitud extends Model
{
   //

     protected $fillable = [

     		 'rut','detalle','reemplazo','fecha_desde','fecha_hasta','cantidad_dias'
     ];

     public function url(){
     	return $this->id ? 'solicitud.update' : 'solicitud.store';

     }
      public function method(){
          return $this->id ? 'PUT' : 'POST';
     }
     public function scopeName($query, $name)
     {
         if($name)
             return $query->where('detalle', 'LIKE', "%$name%");
     }

}
