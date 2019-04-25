<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  protected $table='shops';

  protected $fillable=[
    'name','description','image1','service_id','rating'
  ];


  public function service(){
    return $this->belongsTo('\App\Service');
  }

  public function products(){
    return $this->hasMany('\App\Product');
  }
}
