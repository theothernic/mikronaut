@extends('app')
@section('title', $page->title)


@section('content')
    <div class="ct medium content-editor">
        <form id="frmContentEditor" name="frmContentEditor" method="post" action="{{ route('content.store') }}" >
            <header>
                <h1 class="title">{{ $page->title }}</h1>
            </header>

            @if($errors->any())
                <div class="errors">
                    <h1>Hold on a sec...</h1>

                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="body flex row gutter">
                <section class="editarea flex-two">
                    <div class="control">
                        <label for="txtContentTitle">Title</label>
                        <input type="text" id="txtContentTitle" name="title" value="{{ $page->content->title ?? old('title') }}"/>
                    </div>
                    <div class="control">
                        <label for="txtContentBody">Body</label>
                        <textarea id="txtContentBody" name="body" required="required">{{ $page->content->body ?? old('body') }}</textarea>
                    </div>
                </section>
                <aside class="sidebar flex-one">
                    <div class="control actions">
                        <button id="cmdSave" type="submit">Save</button>
                    </div>
                    <h3>Content Type</h3>
                    <div class="control">
                        <select id="cboContentType" name="type" required="required">
                            @foreach($page->contentTypes as $ctype)
                                <option value="{{ $ctype }}" @selected($page->content->type == $ctype)>{{ ucfirst($ctype) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h3>Format</h3>
                    <div class="control">
                        <select id="cboContentFormat" name="format" required="required">
                            @foreach($page->contentFormats as $val => $fmt)
                                <option value="{{ $val }}" @selected($page->content->format == $val)>{{ ucfirst($fmt) }}</option>
                            @endforeach
                        </select>
                    </div>


                    <h3>Visibility</h3>
                    <div class="control">
                        <select id="cboContentVisibility" name="visibility" required="required">
                            @foreach($page->contentVisibility as $vis)
                                <option value="{{ $vis }}" @selected($page->content->visibility == $vis)>{{ ucfirst($vis) }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
            </div>

            <input type="hidden" name="id" value="{{ $page->content->id ?? null }}" />
            <input type="hidden" name="in_reply_to" value="{{ $page->replyTo ?? null }}" />
            <input type="hidden" name="author_id" value="{{ $page->user->id }}" autocomplete="off"/>
            @csrf
        </form>
    </div>
@endsection
