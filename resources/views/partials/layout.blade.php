<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title> {{ config('app.name') }}</title>

    @vite('resources/sass/style.scss')
</head>

<body>
    <div class="wrapper">

        @include('partials.header')

        <main class="main">
            @yield('content')

        </main>

        @include('partials.footer')

    </div>

    @vite('resources/ts/app.ts')
</body>

</html>
