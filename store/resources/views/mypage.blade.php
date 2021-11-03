@include('layouts.mypage')
<main>
    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    <div class="cont-info">
        <div class="user-box">
            <h1 class="user-name">{{Auth::user()->name}}さん</h1>
        </div>
        <div class="reseve-info">
            <div class="reseve-now">
                <h2 class="reseve-title"><span class="square"></span>予約状況</h2>
                @foreach ($reserve_new as $key=>$item)
                <div class="reseve-box">
                    <div class="table-title">
                        <p class="reseve-num">予約{{$key+1}}</p>
                        <form action="{{route('reserve_delete')}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="deleat-btn" onclick="return confirm('予約をキャンセルしますか？')">×</button>
                        </form>
                    </div>
                    <table class="reseve-table">
                        <tr>
                            <th>Shop</th>
                            <td>{{$item->store->name}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$item->reserve_date->format('Y年m月d日')}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$item->reserve_date->format('H時i分')}}</td>
                        </tr>
                        <tr>
                            <th>People</th>
                            <td>{{$item->people}}人</td>
                        </tr>
                        <tr>
                            <th>QRコード</th>
                            <td>{!! QrCode::size(100)->generate(route('qrcode', $item->user->id)) !!}</td>
                        </tr>
                        <tr>
                            <th>　</th>
                            <td><button class="edit">編集</button></td>
                        </tr>
                    </table>
                    <!--原因あり-->
                    <form action="{{ url('mypage/update/'.$item->id) }}" method="POST">
                        @csrf
                        @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endauth
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="store_id" value="{{$item->store->id}}">
                        <table class="reseve-edit-table">
                            <tr>
                                <th>Shop</th>
                                <td class="shop-name">{{$item->store->name}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><input type="text" name="reseve_day" class="date" id="datepicker" value="{{$item->reserve_date->format('Y/m/d')}}"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td><select name="reseve_time" class="reseve_time">
                                        <option value="14:00:00" @if ($item->reserve_date->format('H:i')=="14:00")selected @endif>14:00</option>
                                        <option value="15:00:00" @if ($item->reserve_date->format('H:i')=="15:00")selected @endif>15:00</option>
                                        <option value="16:00:00" @if ($item->reserve_date->format('H:i')=="16:00")selected @endif>16:00</option>
                                        <option value="17:00:00" @if ($item->reserve_date->format('H:i')=="17:00")selected @endif>17:00</option>
                                        <option value="18:00:00" @if ($item->reserve_date->format('H:i')=="18:00")selected @endif>18:00</option>
                                        <option value="19:00:00" @if ($item->reserve_date->format('H:i')=="19:00")selected @endif>19:00</option>
                                        <option value="20:00:00" @if ($item->reserve_date->format('H:i')=="20:00")selected @endif>20:00</option>
                                        <option value="21:00:00" @if ($item->reserve_date->format('H:i')=="21:00")selected @endif>21:00</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td> <select name="people" id="" class="peoples">
                                        <option value="1" @if ($item->people==1)selected @endif>1</option>
                                        <option value="2" @if ($item->people==2)selected @endif>2</option>
                                        <option value="3" @if ($item->people==3)selected @endif>3</option>
                                        <option value="4" @if ($item->people==4)selected @endif>4</option>
                                        <option value="5" @if ($item->people==5)selected @endif>5</option>
                                        <option value="6" @if ($item->people==6)selected @endif>6</option>
                                        <option value="7" @if ($item->people==7)selected @endif>7</option>
                                        <option value="8" @if ($item->people==8)selected @endif>8</option>
                                        <option value="9" @if ($item->people==9)selected @endif>9</option>
                                        <option value="10" @if ($item->people==10)selected @endif>10</option>
                                        <option value="11" @if ($item->people==11)selected @endif>11</option>
                                        <option value="12" @if ($item->people==12)selected @endif>12</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th class="update"><button class="update-button">更新</button></td>
                                <td class="cancel"><button class="cancel-button" type="button">キャンセル</button></td>
                            </tr>
                        </table>

                    </form>
                </div>
                @endforeach
            </div>
            <div class="reseve-old">
                <h2 class="reseve-title"><span class="square"></span>終了した予約</h2>
                @foreach ($reserve_old as $key=>$old)
                <div class="reseve-box">
                    <div class="table-title">
                        <p class="reseve-num">予約{{$key+1}}</p>
                        <form action="{{route('reserve_delete')}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $old->id }}">
                            <button class="deleat-btn" onclick="return confirm('予約をキャンセルしますか？')">×</button>
                        </form>
                    </div>
                    <table class="reseve-table">
                        <tr>
                            <th>Shop</th>
                            <td>{{$old->store->name}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$old->reserve_date->format('Y年m月d日')}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$old->reserve_date->format('H時i分')}}</td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>{{$old->people}}人</td>
                        </tr>
                        <tr>
                            <th>comment</th>
                            <td><a href="#" type="button" class="js-modal-open">レビューを投稿</a>
                                <div>
                                    @foreach($reviews as $review)
                                    @if($old->id == $review->reserve_id)
                                    {{$review->user->name}}<br>
                                    @if($review->stars == 1)
                                    ★<br>
                                    @elseif($review->stars == 2)
                                    ★★<br>
                                    @elseif($review->stars == 3)
                                    ★★★<br>
                                    @elseif($review->stars == 4)
                                    ★★★★<br>
                                    @elseif($review->stars == 5)
                                    ★★★★★<br>
                                    @endif
                                    {{$review->comment}}<br>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal js-modal">
                    <div class="modal__bg"></div>
                    <div class="modal__content">
                        <h2>レビューの投稿</h2>
                        <form action="{{ url('review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="reserve_id" value="{{ $old->id }}">
                            <input type="hidden" name="store_id" value="{{$old->store->id}}">
                            @auth
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                            <div class="review-title">スター</div>
                            <div>
                                <p><input type="radio" value="1" name="stars"><span>★</span></p>
                                <p><input type="radio" value="2" name="stars"><span>★★</span></p>
                                <p> <input type="radio" value="3" name="stars"><span>★★★</span></p>
                                <p> <input type="radio" value="4" name="stars"><span>★★★★</span></p>
                                <p> <input type="radio" value="5" name="stars"><span>★★★★★</span></p>
                            </div>
                            <div class="review-title">コメント</div>
                            <div>
                                <textarea class="comment-area" name="comment" rows="10" required></textarea>
                            </div>
                            <button class="rev-submit">登録</button>
                            <button class="js-modal-close">閉じる</a>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
        <div class="favorite">
            <h2 class="favorite-title">お気に入り店舗</h2>
            @foreach ($favorite as $like)
            <div class="card">
                <img class="card-img" src="/storage/shops/{{$like->store->filename}}" alt="">
                <div class="card-content">
                    <p class="card-title">{{$store[$loop->iteration]->name}}</p>
                    <p class="card-text">＃{{$store[$loop->iteration]->area->name}} ＃{{$store[$loop->iteration]->genre->name}}</p>
                </div>
                <div class="card-link">
                    <button class="shop-detail" onclick="location.href='{{route('detail',$like->store->id)}}'">詳しくみる</button>
                    <div class="fav-button">
                        <a href="{{route('fav_off',$like->store_id)}}"><img src="{{asset('img/fav1.png')}}" alt="お気に入り削除" class="heart"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</main>