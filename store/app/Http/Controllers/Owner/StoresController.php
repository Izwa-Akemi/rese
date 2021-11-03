<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Owner;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class StoresController extends Controller
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
        $stores = Store::where('owner_id', $owner)->get();
        return view('owner.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //全エリア情報を取得
        $areas = Area::all();
        //全ジャンル情報を取得
        $genres = Genre::all();
        return view('owner.stores.create', compact('areas', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadImageRequest $request)
    {
        $imageFile = $request->image; //一時保存 
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore=ImageService::upload($imageFile, 'shops');
        }
        Store::create([
            'name' => $request->name,
            'owner_id' => $request->owner_id,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'filename' => $fileNameToStore,
            'detail' => $request->detail,
        ]);
        return redirect()
            ->route('owner.stores.index')
            ->with([
                'message' => '店舗登録を実施しました。',
                'status' => 'info'
            ]);
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
        //全エリア情報を取得
        $areas = Area::all();
        //全ジャンル情報を取得
        $genres = Genre::all();
        $store = Store::findOrFail($id);
        return view('owner.stores.edit', compact('store', 'areas', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->image; //一時保存 
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore=ImageService::upload($imageFile, 'shops');
        }
        $store = Store::findOrFail($id);
        $store->name = $request->name;
        $store->owner_id = $request->owner_id;
        $store->area_id = $request->area_id;
        $store->genre_id = $request->genre_id;
        $store->filename = $fileNameToStore;
        $store->detail = $request->detail;
        $store->save();
        return redirect()
            ->route('owner.stores.index')
            ->with([
                'message' => '店舗情報を更新しました。',
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
        Store::findOrFail($id)->delete();

        return redirect()
            ->route('owner.stores.index')
            ->with([
                'message' => '店舗を削除しました。',
                'status' => 'alert'
            ]);
    }
}
