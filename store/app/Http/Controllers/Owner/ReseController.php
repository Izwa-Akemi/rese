<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Owner;
use App\Models\User;
use App\Models\Email;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\SendContactMail;

class ReseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:owners');
    }
    public function index()
    {
        $owner = Auth::id();
        $carbon = Carbon::today();
        $store_id = [];
        $reserve_new = [];
        $reserve_old = [];
        $stores = Store::select('id')->where('owner_id', $owner)->get();

        foreach ($stores as $store) {
            $store_id[] = $store->id;
        }
        $reserve = Reservation::where('store_id', $store_id)->get();
        foreach ($reserve as $book) {
            if ($book->reserve_date->gt($carbon)) {
                $reserve_new[] = $book;
            } else {
                $reserve_old[] = $book;
            }
        }

        return view('owner.rese.index', compact('reserve_new', 'reserve_old'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = Reservation::findOrFail($id);
        return view('owner.rese.edit', compact('reserve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mails = new Email;
        $mails->owner_id = $request->owner_id; //追加コード
        $mails->subject = $request->subject;
        $mails->email = $request->email;
        $mails->detail = $request->detail;
        $mails->save();

        //メール送信
        //オーナーのメールアドレスを取得
        $owner = Auth::id();
        $owner_mail =DB::table('owners')->select('email')->where('id',  $owner)->first();
        $subject =$request->subject;
        $detail = [
            'word' => $request->detail,
        ];
        //ユーザーのメールアドレス
        $to = $request->email;
        //入力されたメールアドレスにメールを送信
        $owner_mail =DB::table('owners')->select('email')->where('id',  $owner)->first();
        Mail::to($to)->send(new SendContactMail($owner_mail,$subject,$detail));
        //再送信を防ぐためにトークンを再発行
        $request->session()->regenerateToken();

        return redirect()
            ->route('owner.rese.index')
            ->with([
                'message' => 'メールを送信しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
