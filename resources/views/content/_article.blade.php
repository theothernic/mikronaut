<article class="{{ $display }} hentry h-entry content-{{ $content->title }}">
    <header>
        @if ($content->title)<h2 class="title">{{ $content->title }}</h2>@endif
    </header>

    <div class="body">
        {{ $content->body }}
    </div>

    <footer></footer>
</article>

<div class="meta flex align-items--center">
    <div class="postline">posted {{ $content->publishAt->format('m.d.Y') }}</div>
    <span class="sep">&bull;</span>
    <a href="{{ route('content.single', $content->id) }}"
       title="Link to post {{ $content->title ?? $content->id }}"
       class="permalink">Link</a>
    @if($page->userIsLoggedIn)
        <span class="sep">&bull;</span>
        <a href="{{ route('content.editor', ['reply' => $content->id]) }}" class="reply">Reply to&hellip;</a>
        <span class="sep">&bull;</span>
        <a href="{{ route('content.editor', ['edit' => $content->id]) }}" class="edit">Edit&hellip;</a>
    @endif
</div>