<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Owner extends Authenticatable
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * storeテーブルとリレーション
     */
    public function store() {
        return $this->hasMany('App\Models\Store');
    }
     /**
     * mailsテーブルとリレーション
     */
    public function mails() {
        return $this->hasMany('App\Models\Mail');
    }
}
