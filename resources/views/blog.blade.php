<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @foreach($page->meta as $name => $content)

        @unless(empty($content))
            <meta name="{{ $name }}" content="{{ $content }}" />
        @endunless

    @endforeach

    <title>{{ $page->title ?? 'Hello there.' }} {{ config('app.name') }}</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    @vite(['resources/js/blog.js'])

</head>
<body>


<div class="ct flex blog-page gutter centered">
    <div class="brand">
        <h1><a href="{{ route('front') }}">{{ config('app.name') }}</a></h1>
    </div>

    <aside id="sidebar" class="flex-one">
        <div class="brand">
            <h1><a href="{{ route('front') }}">{{ config('app.name') }}</a></h1>
        </div>


        @unless(empty($page->site['description']))
        <div class="description">
            <h3>What's this about?</h3>
            <p>
                {{ $page->site['description'] }}
            </p>
        </div>
        @endunless

        {{--<div class="search">
            <h3>Search</h3>

            <div class="control flex">
                <input type="text" id="txtSearchEntry" />
                <button>Search</button>
            </div>


        </div>--}}
    </aside>

    <main id="content" class="flex-two">
        @yield('content')
    </main>
</div>


</body>
</html>
