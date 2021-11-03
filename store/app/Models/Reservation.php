<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = array('id');
    protected $dates = ['reserve_date'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function store(){
        return $this->belongsTo('App\Models\Store');
    }
      /**
     * evalutionsテーブルとリレーション
     */
    public function evolutions() {
        return $this->hasMany('App\Models\Evalution');
    }
}
