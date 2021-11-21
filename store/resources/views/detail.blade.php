<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('css/apoint.css') }}">
</head>

<body>
    <header>
        @include('layouts.header')
    </header>
    <main>
        <section class="main-section">
            <div class="shop">
                <div class="shop-wrap">
                    <div class="shop-name">
                        <button onclick="history.back()">
                            &#12296;</button>
                        <label>{{$items->name}}</label>
                    </div>
                    <div class="shop-img">
                        <img src="/storage/shops/{{$items->filename}}" alt="">
                    </div>
                    <div class="shop-message">
                        <p>#<span>{{$items->area->name}}</span>#<span>{{$items->genre->name}}</span></p>
                        <div class="shop-button">
                            <p>{{$items->detail}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apoint">
                <div class="apoint-wrap">
                    <form action="{{route('reservation',$data)}}" method="POST">
                        @csrf
                        @if($errors->any())
                        <div style="color:#ffffff;">
                            【エラー】<br><br>
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                            @endforeach
                        </div>
                        <br>
                        @endif
                        <div class="apoint-info">
                            @auth
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                            <input type="hidden" name="store_id" value="{{ $items->id }}">
                            <h1>予約</h1>
                            <input type="text" name="reseve_day" class="date" id="datepicker">
                            <div class="time">
                                <select name="reseve_time" class="times">
                                    <option value="14:00:00">14:00</option>
                                    <option value="15:00:00">15:00</option>
                                    <option value="16:00:00">16:00</option>
                                    <option value="17:00:00">17:00</option>
                                    <option value="18:00:00">18:00</option>
                                    <option value="19:00:00">19:00</option>
                                    <option value="20:00:00">20:00</option>
                                    <option value="21:00:00">21:00</option>
                                </select>
                            </div>
                            <div class="people">
                                <select name="people" id="" class="peoples">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="apoint-pass">
                            @if (Route::has('login'))
                            @auth
                            @foreach ($reserve as $book)
                            <table class="apoint-table">
                                <tr>
                                    <th class="apont-table-topspace">Shop</th>
                                    <td class="apont-table-topspace">{{$book->store->name}}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{$book->reserve_date->format('Y-m-d')}}</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>{{$book->reserve_date->format('H:i')}}</td>
                                </tr>
                                <tr>
                                    <th class="apont-table-bottomspace">Number</th>
                                    <td class="apont-table-bottomspace">{{$book->people}}人</td>
                                </tr>
                            </table>
                            @endforeach
                            @endauth
                            @endif
                        </div>

                        <div class="apoint-submit">
                            @if (Route::has('login'))
                            <button>予約する</button>
                            @auth
                            @else
                            <button onclick="location.href='{{url('/login')}}'">予約する</button>
                            @endauth
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </section>

        <section class="review">
            <h2>カスタマーレビュー</h2>
            @foreach ($reviews as $review)
            <ul>
                <li>
                    <p>{{$review->user->name}}</p>
                </li>
                <li class="star">
                    @if($review->stars == 1)
                    <p>★</p>
                    @elseif($review->stars == 2)
                    <p>★★</p>
                    @elseif($review->stars == 3)
                    <p>★★★</p>
                    @elseif($review->stars == 4)
                    <p>★★★★</p>
                    @elseif($review->stars == 5)
                    <p>★★★★★</p>
                    @endif
                </li>
                <li>
                    <p>コメント：</p>
                    <p>{{$review->comment}}</p>
                </li>
            </ul>
            @endforeach
        </section>

    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>