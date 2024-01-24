@extends('blog')

@section('content')
    @include('content._article', ['content' => $page->content, 'display' => 'single'])
@endsection
