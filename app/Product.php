<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='products';

  protected $fillable=[
    'shop_id','header','image1','image2','price','description','discount_price'
  ];

  public function shop(){
    return $this->belongsTo('\App\Shop');
  }
}
