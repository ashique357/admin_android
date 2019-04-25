<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';

    protected $fillable=[
      'title','thumbnail'
    ];

    protected $hidden=[
      'user_id'
  ];

  public function user(){
    return $this->belongsTo('\App\User');
  }

  public function shops(){
    return $this->hasMany('\App\Shop');
  }


}
