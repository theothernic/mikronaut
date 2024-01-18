@extends('blog')

@section('content')
    <article class="single hentry h-entry content-{{ $page->content->type }}">
        <header>
            @if ($page->content->title)<h2 class="title">{{ $page->content->title }}</h2>@endif
        </header>

        <div class="body">
            {{ $page->content->body }}
        </div>

        <footer></footer>
    </article>

    <div class="meta flex align-items--center">
        <div class="postline">posted at {{ $page->content->publishAt->format('m.d.Y') }}</div>
        <span class="sep">&bull;</span>
        <a href="{{ route('content.single', $page->content->id) }}"
           title="Link to post {{ $page->content->title ?? $page->content->id }}"
           class="permalink">Link</a>
        @if($page->userIsLoggedIn)
            <span class="sep">&bull;</span>
            <a href="{{ route('content.editor', ['reply' => $page->content->id]) }}" class="reply">Reply to&hellip;</a>
            <span class="sep">&bull;</span>
            <a href="{{ route('content.editor', ['edit' => $page->content->id]) }}" class="edit">Edit&hellip;</a>
        @endif
    </div>
@endsection
