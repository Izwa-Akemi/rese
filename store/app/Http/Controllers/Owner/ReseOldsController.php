<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Owner;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReseOldsController extends Controller
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
        $store_id=[];
        $reserve_new = [];
        $reserve_old = [];
        $stores = Store::select('id')->where('owner_id', $owner)->get();
      
        foreach($stores as $store){
            $store_id[] = $store->id;
        }
        $reserve = $reserve = Reservation::where('store_id',$store_id)->get();
        foreach($reserve as $book)
        {
            if($book->reserve_date ->gt($carbon))
            {
                $reserve_new[] = $book;
            }else
            {
                $reserve_old[] = $book;
            }
        }

        return view('owner.rese_old.index', compact('reserve_old'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
