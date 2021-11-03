<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
</head>

<body>
    <header>
        @include('layouts.header')
    </header>
    <main>
        <section class="main-section">
            <div class="regist-contents">
                <div class="regist">
                    <p>Registration</p>
                </div>
                   <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="regist-info">
                        <div class="regist-name">
                            <label for=""><img src="./img/human.jpeg" alt=""></label>
                            <input type="text" placeholder="Username" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class="regist-email">
                            <label for=""><img src="./img/mail.jpeg" alt=""></label>
                            <input type="text" placeholder="Email" name="email" :value="old('email')" required />
                        </div>
                        <div class="login-password">
                            <label><img src="./img/key.jpeg" alt=""></label>
                            <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="submit">
                        <button class="regist-submit">登録</button>
                    </div>
                </form>
            </div>
        </section>

    </main>
</body>

</html>