<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    protected $table = 'komen';

    public function user() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
