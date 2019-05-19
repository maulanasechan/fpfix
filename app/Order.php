<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function user() {
    	return $this->belongTo('App\User', 'id_user', 'id') ;
    }

    public function order() {
    	return $this->belongTo('App\barang_dijual', 'id_barang', 'id_barang');
    }
}
