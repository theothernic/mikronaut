@extends('blog')
@section('title', $page->title)

@section('content')
    @unless($page->records->isEmpty())
        <ul class="posts">
            @foreach($page->records as $p)
            <li>
                <article class="excerpt {{ $p->type }}">
                    {{ $p->body }}
                </article>

                <div class="meta flex align-items--center">
                    <div class="postline">posted at {{ $p->publishAt->format('m.d.Y') }}</div>
                    <span class="sep">&bull;</span>
                    <a href="{{ route('content.single', $p->id) }}" class="permalink">Permalink</a>
                </div>
            </li>
            @endforeach
        </ul>
    @else
        <div class="empty">(so sorry, no posts to view at the moment.)</div>
    @endunless
@endsection
