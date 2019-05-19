<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use Notifiable;
    
    protected $guard = 'penjual';
    protected $table = 'penjuals';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_penjual', 'email', 'password', 'alamat', 'avatar', 'waktu_buka', 'waktu_tutup'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
