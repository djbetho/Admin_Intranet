<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semestre extends Model
{
  protected $fillable = [

      'name','fecha_ini','fecha_term','cantidad'
  ];
  protected $dates = [
      'fecha_ini',
      'fecha_term'
  ];

}
