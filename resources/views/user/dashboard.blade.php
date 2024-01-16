@extends('app')
@section('title', $page->title)


@section('content')
    <div class="container">
        <header>
            <h1>{{ $page->title }}</h1>
        </header>

        <div id="body">
            This is the user dashboard.

            <div>
                <a href="{{ route('content.editor') }}">Editor</a>
            </div>
        </div>

    </div>

@endsection
