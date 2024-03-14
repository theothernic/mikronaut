<article class="{{ $display }} hentry h-entry content-{{ $content->type }} format-{{ $content->format }}">
    <header>
        @if ($content->title)
            <h2 class="title">
                @if($content->type === 'link')
                    <a href="{{ $content->title }}">{{ $content->title }}</a>
                @else
                    {{ $content->title }}
                @endif
            </h2>
        @endif
    </header>

    <div class="body">
        @switch($content->format)

            @case('mk')
            @case('markdown')
                {!! html_entity_decode(\App\Helpers\ContentFormatHelper::fromMarkdown($content->body)) !!}
                @break

            @default
                {!! html_entity_decode(
                        htmlspecialchars_decode(\App\Helpers\ContentFormatHelper::formatHtml($content->body))
                    , ENT_QUOTES|ENT_HTML5) !!}
        @endswitch
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
