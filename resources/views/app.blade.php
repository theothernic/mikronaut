<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')  {{ config('app.name') }}</title>


    @vite(['resources/js/app.js'])
</head>
<body>
    <header id="masthead" class="flex row jc-btw align-items--center">
        <section class="brand">
            <h1>{{ config('app.name') }}</h1>
        </section>

        <section>

            @if ($page->user)
                <div class="greeting">Howdy, <a href="{{ route('user.dashboard') }}">{{ $page->user->name }}</a></div>
            @endif
        </section>
    </header>
    <main id="content">@yield('content')</main>
    <footer id="colophon"></footer>
</body>
</html>
