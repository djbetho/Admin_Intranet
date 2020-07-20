<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class RecordSolicitud extends Model
{
   //

     protected $fillable = [

     		 'rut','detalle','reemplazo','fecha_desde','fecha_hasta','cantidad_dias','semestre','observacion'
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
     public function user(){
       return $this->belongsTo(User::class,'rut','rut');
    }



}
