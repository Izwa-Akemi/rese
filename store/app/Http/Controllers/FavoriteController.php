<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //お気に入りに追加
    public function fav_on($id,Store $store)
    {
        $fav = New Favorite();
        $fav->store_id = $id;
        $fav->user_id = Auth::id();
        $fav->save();
        return back();
    }

    //お気に入りを削除
    public function fav_off($id,Store $store)
    {
        $user=Auth::id();
        $fav=Favorite::where('store_id',$id)->where('user_id',$user)->first();
        $fav->forceDelete();
        return back();
    }
}
