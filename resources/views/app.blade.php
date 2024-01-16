<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')  {{ config('app.name') }}</title>
</head>
<body>
    <header id="masthead">
        <section class="brand">
            <h1>{{ config('app.name') }}</h1>
        </section>
    </header>
    <main id="content">@yield('content')</main>
    <footer id="colophon"></footer>
</body>
</html>
