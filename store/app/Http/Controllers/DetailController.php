<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Admin;
use App\Models\Evalution;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendUserMail;
use App\Mail\SendAdminMail;

class DetailController extends Controller
{
    //お店の詳細情報とID、ログイン済みユーザーの予約情報があれば詳細ページに送る。
    public function index($id)
    {
        $items = Store::find($id);
        $data = $id;
        $carbon = Carbon::today();
        $user = Auth::id();
        $reserve = Reservation::where('user_id', $user)->where('store_id', $data)->where('reserve_date', '>=', $carbon)->get();
        $reviews = Evalution::where('store_id',$id)->get();
        return view('detail', compact('items', 'data', 'reserve','reviews'));
    }
    public function reservation(ReservationRequest $request)
    {

        //予約情報を登録。予約完了ページを表示。
        Reservation::create([
            'store_id' => $request->store_id,
            'user_id' => $request->user_id,
            'reserve_date' => $request->reserve_date,
            'people' => $request->people
        ]);

        //user_idからidに紐づくユーザーの名前とメールアドレスを取得
        $user_id = $request->user_id;
        $users = DB::table('users')->select('name', 'email')->where('id', $user_id)->first();
       
        //store_idからidに紐づく店舗名とowner_idを取得
        $store_id = $request->store_id;
        $stores = DB::table('stores')->select('name','owner_id')->where('id',  $store_id)->first();
        //ownerテーブルからメールアドレスを取得
        $to =  DB::table('owners')->select('email')->where('id',  $stores->owner_id)->first();
       
        //予約情報を取得
        $data = [
            'reserve_date' => $request->reserve_date,
            'people' => $request->people
        ];
        
        //入力されたメールアドレスにメールを送信
        Mail::to($users->email)->send(new SendUserMail($data, $users,$stores));
        Mail::to($to)->send(new SendAdminMail($data, $users,$stores));
        //再送信を防ぐためにトークンを再発行
       $request->session()->regenerateToken();

        return view('done');
    }
}
