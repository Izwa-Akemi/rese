<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalution extends Model
{
    use HasFactory;
    protected $guarded = array('id');
   
      /**
     * evalutionsテーブルとリレーション
     */
    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function reservation() {
        return $this->belongsTo('App\Models\Reservation');
    }

}
