<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use App\User;
class  tftattlog extends Model
{
  protected $connection = 'mysql2';

  protected $fillable = [

      'LogID','IP','EnrollNumber','VerifyMode','InOutMode','Time','WorkCode'
  ];
}
