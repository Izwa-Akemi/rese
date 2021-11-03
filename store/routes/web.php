<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MypageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ホームページ
Route::get('/', [StoreController::class, 'index'])->name('home');
//検索
Route::get('/sarch', [StoreController::class, 'search'])->name('sarch-result');
//お店の詳細ページ
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/done', function () {
    return view('done');
})->name('done');
Route::get('/qrcode/{id}', [StoreController::class, 'show'])->name('qrcode');
/*Route::get('/mypage', function () {
    return view('mypage');
})->middleware(['auth'])->name('mypage');*/

//登録ユーザーの操作
Route::group(['middleware' => ['auth']], function () {
    //ユーザーのマイページを表示
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    // お気に入りボタンon off
    Route::get('/fav_on/{id}', [FavoriteController::class, 'fav_on'])->name('fav_on');
    Route::get('/fav_off/{id}', [FavoriteController::class, 'fav_off'])->name('fav_off');

    //お店の予約
    Route::post('/detail/{id}', [DetailController::class, 'reservation'])->name('reservation');
    //お店の予約キャンセル
    Route::delete('mypage', [MypageController::class, 'reserve_delete'])->name('reserve_delete');

    //お店の予約変更
    Route::post('/mypage/update/{id}', [MypageController::class, 'update']);

    //お店の評価コメント
    Route::post('/review', [MypageController::class, 'review']);
});

require __DIR__ . '/auth.php';
