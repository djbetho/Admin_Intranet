<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordSolicitud extends Model
{
   //

     protected $fillable = [

     		 'rut','detalle','fecha_desde','fecha_hasta','cs', 'reemplazo', 'estado',
     ];
}
