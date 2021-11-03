<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    //新規追加
    public function owner()
    {
        return $this->belongsTo('App\Models\Owner');
    }
}
