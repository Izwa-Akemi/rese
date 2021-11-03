<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/qr.css') }}">

</head>

<body>
    <header>
        @auth
        @include('layouts.header2')
        @endauth
        @guest
        @include('layouts.header')
        @endguest
    </header>
    <main>
        <section class="main-section">
            <h2>予約内容詳細</h2>
            <div class="main-contents">
                
                <table>
                    <tr>
                        <th>店舗名</th>
                        <td>{{$reserves->store->name}}</td>
                    </tr>
                    <tr>
                        <th>予約者名</th>
                        <td>{{$reserves->user->name}}</td>
                    </tr>
                    <tr>
                        <th>予約日</th>
                        <td>{{$reserves->reserve_date->format('Y年m月d日')}}</td>
                    </tr>
                    <tr>
                        <th>予約時間</th>
                        <td>{{$reserves->reserve_date->format('H時i分')}}</td>
                    </tr>
                    <tr>
                        <th>予約人数</th>
                        <td>{{$reserves->people}}人</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</body>
</html>