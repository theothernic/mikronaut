@extends('blog')
@section('title', $page->title)

@section('content')
    @unless($page->content->isEmpty())
        <ul class="posts">
            @foreach($page->content as $p)
            <li>
                @include('content._article', ['content' => $p, 'display' => 'single'])
            </li>
            @endforeach
        </ul>
    @else
        <div class="empty">(so sorry, no posts to view at the moment.)</div>
    @endunless
@endsection
