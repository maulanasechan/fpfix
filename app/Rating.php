<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    public function user () {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
