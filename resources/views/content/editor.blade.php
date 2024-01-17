@extends('app')
@section('title', $page->title)


@section('content')
    <div class="ct medium content-editor">
        <form id="frmContentEditor" name="frmContentEditor" method="post" action="{{ route('content.store') }}" >
            <header>
                <h1 class="title">{{ $page->title }}</h1>
            </header>

            <div class="body flex row gutter">
                <section class="editarea flex-two">
                    <div class="control">
                        <label for="txtContentTitle">Title</label>
                        <input type="text" id="txtContentTitle" name="title" required="required" />
                    </div>
                    <div class="control">
                        <label for="txtContentBody">Body</label>
                        <textarea id="txtContentBody" name="body" required="required"></textarea>
                    </div>
                </section>
                <aside class="sidebar flex-one">
                    <div class="control actions">
                        <button id="cmdSave" type="submit">Save</button>
                    </div>
                    <h3>Content Type</h3>
                    <div class="control">
                        <select id="cboContentType" name="content_type_key" required="required">
                            @foreach($page->contentTypes as $ctype)
                                <option value="{{ $ctype }}">{{ ucfirst($ctype) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h3>Format</h3>
                    <div class="control">
                        <select id="cboContentFormat" name="format" required="required">
                            @foreach($page->contentFormats as $fmt)
                                <option value="{{ $fmt }}">{{ ucfirst($fmt) }}</option>
                            @endforeach
                        </select>
                    </div>


                    <h3>Visibility</h3>
                    <div class="control">
                        <select id="cboContentVisibility" name="visibility" required="required">
                            @foreach($page->contentVisibility as $vis)
                                <option value="{{ $vis }}">{{ ucfirst($vis) }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
            </div>
            @csrf
        </form>
    </div>
@endsection
