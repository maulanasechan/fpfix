<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_dijual extends Model
{
    protected $primaryKey = 'id_barang';

    public function order () {
    	return $this->hasMany('App\order', 'id_barang', 'id_barang');
    }

    public function penjual() {
    	return $this->belongsTo('App\Penjual', 'id_penjual', 'id');
    }
}
