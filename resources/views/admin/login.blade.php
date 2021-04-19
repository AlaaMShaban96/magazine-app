<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
    <body class="font-sans antialiased">
        <main>
            <form action="{{url('/login')}}" method="post">
                @csrf
                <div class="login">
                    <div class="form-holder">
                        <div class="logo"><i class="fa fa-image"></i> المجلة  </div>
                        <h2>تسجيل دخول</h2>
                            <div class="form-input-container">
                                <input type="email" class="form-input" id="email" name="email" placeholder="اسم المستخدم">
                                <label for="email">اسم المستخدم</label>
                            </div>
                            <div class="form-input-container">
                                <input type="password" name="password" class="form-input" id="password" placeholder="كلمة السر">
                                <label for="password">كلمة السر</label>
                            </div>
                    </div>
                    <button type="submit" class="button button-wide">تسجيل دخول</button>
                </div>
            </form>
        </main>
    </body>
</html>
