<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function user() {
    	return $this->belongsTo('App\User', 'id_user', 'id') ;
    }

    public function barang_dijual() {
    	return $this->belongsTo('App\barang_dijual', 'id_barang', 'id_barang');
    }
}
