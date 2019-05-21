<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resep extends Model
{
	protected $primaryKey = 'id_resep';
	
    public function user() {
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

}
