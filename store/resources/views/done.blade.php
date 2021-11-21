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
        @include('layouts.header')
    </header>
<main>
        <section class="main-section">
            <div class="thanks-contents">
                <h1>ご予約ありがとうございます</h1>
                <div class="submit">
                    <button class="thanks-submit" onclick="history.back()">戻る</button>
                </div>
            </div>
        </section>

    </main>  
</body>
</html>