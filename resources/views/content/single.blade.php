@extends('blog')

@section('content')
    <article class="single hentry h-entry content-{{ $page->content->type }}">
        @if ($page->content->title)<h2 class="title">{{ $page->content->title }}</h2>@endif
        {{ $page->content->body }}
    </article>

    <div class="meta flex align-items--center">
        <div class="postline">posted at {{ $page->content->publishAt->format('m.d.Y') }}</div>
        <span class="sep">&bull;</span>
        <a href="{{ route('content.single', $page->content->id) }}" class="permalink">Permalink</a>
    </div>
@endsection
