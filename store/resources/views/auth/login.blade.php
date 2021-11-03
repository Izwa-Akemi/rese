<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header>
        @include('layouts.header')
    </header>
    <main>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <section class="main-section">
            <div class="login-contents">
                <div class="login">
                    <p>Login</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-info">

                        <div class="login-email">
                            <label><img src="{{ asset('img/mail.jpeg') }}" alt=""></label>
                            <input type="email" placeholder="Email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class="login-password">
                            <label><img src="{{ asset('img/key.jpeg') }}" alt=""></label>
                            <input type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                        </div>
                        <div class="submit">
                            <x-button class="login-submit">{{ __('Log in') }}</x-button>
                        </div>
                    </div>
                </form>
            </div>

        </section>

    </main>
</body>

</html>