@extends('blog')
@section('title', $page->title)

@section('content')
    @unless($page->content->isEmpty())
        <ul class="posts">
            @foreach($page->content as $p)
            <li>
                <article class="excerpt {{ $p->type }}">
                    <header>
                        @if ($p->title)<h2 class="title">{{ $p->title }}</h2>@endif
                    </header>

                    <section class="body">
                        {!! $p->body !!}
                    </section>


                    <footer>
                        &nbsp;
                    </footer>
                </article>

                <div class="meta flex align-items--center">
                    <div class="postline">posted at {{ $p->publishAt->format('m.d.Y') }}</div>
                    <span class="sep">&bull;</span>
                    <a href="{{ route('content.single', $p->id) }}" title="Link to post {{ $p->title ?? $p->id }}" class="permalink">Read More/Link&hellip;</a>
                    @if($page->userIsLoggedIn)
                    <span class="sep">&bull;</span>
                    <a href="{{ route('content.editor', ['reply' => $p->id]) }}" class="reply">Reply to&hellip;</a>
                    <span class="sep">&bull;</span>
                    <a href="{{ route('content.editor', ['edit' => $p->id]) }}" class="edit">Edit&hellip;</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    @else
        <div class="empty">(so sorry, no posts to view at the moment.)</div>
    @endunless
@endsection
