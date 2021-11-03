<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
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
            <div class="thanks-contents">
                <h1>会員登録ありがとうございます。</h1>
                <div class="submit">
                    <button class="thanks-submit" onclick="location.href='/mypage'">ログインする</button>
                </div>
            </div>
        </section>

    </main>  
</body>
</html>