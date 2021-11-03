<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Store extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = array('id');

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function favorite() {
        return $this->hasMany('App\Models\Favorite');
    }

     public function user() {
        return $this->belongsTo('App\Models\User');
    }
    //新規追加
    public function owner() {
        return $this->belongsTo('App\Models\Owner');
    }
     /**
     * evalutionsテーブルとリレーション
     */
    public function evolutions() {
        return $this->hasMany('App\Models\Evalution');
    }
}
