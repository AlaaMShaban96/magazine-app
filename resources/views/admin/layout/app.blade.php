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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @yield('style')
    </head>
    <body class="font-sans antialiased">
        @include('admin.layout.header')
        <main>
            <div class="nav">

                <form action="?" method="GET">
                    <input class="search" value="{{Request::query('search')}}" name="search" placeholder="البحث" />
                </form>
                <div class="userArea">
                    <a href="{{route('logout')}}" >
                        <img src="data:image/png;base64,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"/>
                    </a>
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-error">
                        {{  $error}}`
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                @endforeach
            @endif
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            @yield('content')
        </main>
        <script src="{{ asset('js/app.js') }}" defer></script>

    </body>
</html>
