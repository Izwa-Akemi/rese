<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Store;
use App\Models\Evalution;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB; //QueryBuilder

class MypageController extends Controller
{
    public function index()
    {
        //現在の予約と終わった予約情報を取得
        $id = Auth::id();
        $carbon = Carbon::today();
        $reserve_new = [];
        $reserve_old = [];
        $reviews = [];

        $reserve = Reservation::where('user_id', $id)->get();
        /*foreach ($reserve as $book) {
            if ($book->reserve_date->gt($carbon)) {
                $reserve_new[] = $book;
            } else {
                $reserve_old[] = $book;
            }
        }*/

        foreach ($reserve as $book) {
            if ($book->reserve_date->gt($carbon)) {
                $reserve_new[] = $book;
            } else {
                $reserve_old[] = $book;
                $evaltions = Evalution::where('store_id', $book->store->id)->where('reserve_id', $book->id)->get();
                foreach ($evaltions as $evaltion) {
                    $reviews[] = $evaltion;
                }
            }
        }



        //お気に入り情報取得
        $favorite = Favorite::where('user_id', $id)->get();
        $store[0] = 'dummy';
        foreach ($favorite as $fav) {
            $store[] = Store::where('id', $fav->store_id)->first();
        }

        return view('mypage', compact('reserve_new', 'reserve_old', 'favorite', 'store', 'reviews'));
    }

    public function reserve_delete(Request $request)
    {
        //予約情報を論理的削除
        $id = Auth::id();
        $reserve_id = $request->input('id');

        Reservation::where('user_id', $id)->where('id', $reserve_id)->update(['delete_flag' => 1]);
        Reservation::where('user_id', $id)->where('id', $reserve_id)->delete();

        return back();
    }

    //予約情報変更
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        //データ更新
        $reservation = Reservation::find($request->id);
        $reservation->store_id = $request->store_id;
        $reservation->user_id = $request->user_id;
        $reservation->reserve_date = $request->reserve_date;
        $reservation->people = $request->people;
        $reservation->save();
        return redirect('/mypage');
    }

    //5段階評価保存
    public function review(Request $request)
    {
        //既に投稿しているかをチェックする
        /*$message = '既にレビューは投稿済みです';
        $exists = Evalution::where('user_id', $request->user_id)->where('store_id', $request->store_id)->exit();
        if ($exists) {
            $message;
            return;
        }*/
        $request->validate([
            'store_id' => [
                'required',
                'exists:stores,id',
                function ($attribute, $value, $fail) use ($request) {
                    // すでにレビュー投稿してるかチェック
                    $exists = Evalution::where('user_id', $request->user()->id)
                        ->where('store_id', $request->store_id)
                        ->exists();
                    if ($exists) {
                        $fail('すでにレビューは投稿済みです。');
                        return;
                    }
                }
            ],
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        Evalution::create([
            'store_id' => $request->store_id,
            'user_id' => $request->user_id,
            'reserve_id' => $request->reserve_id,
            'stars' => $request->stars,
            'comment' => $request->comment
        ]);
        return redirect('/mypage');
    }
}
