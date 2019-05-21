<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    public function user() {
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
