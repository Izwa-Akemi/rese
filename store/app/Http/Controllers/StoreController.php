<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Evalution;
use Illuminate\Support\Facades\Auth;
use Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //QueryBuilder

class StoreController extends Controller
{
    public function index(Store $store, Request $request)
    {
        $data = $this->getSearchData($request, true);
        return view('home', $data);
    }

    //検索機能
    public function search(Request $request)
    {
        $data = $this->getSearchData($request, false);
        return view('sarch-result', $data);
    }

    // 検索結果を取得する
    private function getSearchData(Request $request)
    {
        //----ショップ情報一覧表機能--------//
        //全エリア情報を取得
        $areas = Area::all();
        //全ジャンル情報を取得
        $genres = Genre::all();
        //ストア情報を取得
        //$items =Store::all();
        $query = Store::query();

        $area = $request->input('area');
        $genre = $request->input('genre');
        $search = $request->input('search');

        if (!empty($area) && $area !== 'All area') {
            $query->where('area_id', $area);
        }

        if (!empty($genre && $genre !== 'All genre')) {
            $query->where('genre_id', $genre);
        }

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $items = $query->get();

        //お気に入り
        $favorites[0] = 'dummy';
        $fav_counts[0] = 'dummy';
        $user = Auth::id();
        //評価
        $avg[0] = 'dummy';
        /*foreach ($items as $item) {
            //お気に入り表示
            $fav = Favorite::where('user_id', $user)->where('store_id', $item['id'])->first();
            if (!empty($fav)) {
                $fav = 1;
            } else {
                $fav = 0;
            }
            array_push($favorites, $fav);

            //お気に入り数カウント
            $fav_count = 0;
            $fav_count = Favorite::where('store_id', $item['id'])->count();
            $fav_counts[] = $fav_count;
        }*/

        $rev = null;
        foreach ($items as $item) {
            //お気に入り表示
            $fav = Favorite::where('user_id', $user)->where('store_id', $item['id'])->first();
            if (!empty($fav)) {
                $fav = 1;
            } else {
                $fav = 0;
            }
            array_push($favorites, $fav);
            //お気に入り数カウント
            $fav_count = 0;
            $fav_count = Favorite::where('store_id', $item['id'])->count();
            $fav_counts[] = $fav_count;
            //評価機能表示
            $rev = Evalution::where('user_id', $user)->where('store_id', $item['id'])->first();
            //評価機能平均
            $rev_avg = 0;
            $rev_avg = DB::table('evalutions')->where('store_id', $item['id'])->avg('stars');
            $avg[] = $rev_avg;
            //dd($fav_counts,$avg);
        }
        return compact('items', 'favorites', 'fav_counts', 'areas', 'genres', 'rev', 'avg');

    }

    //レビュー一覧
    public function show($id)
    {
        $today = Carbon::tomorrow('Asia/Tokyo');
        $todayEnd = $today->copy()->endOfDay();
        $reserves = Reservation::where('user_id',$id)->whereBetween('reserve_date',[$today, $todayEnd])->first();
        return view('qrcode', compact('reserves'));
    }
}
