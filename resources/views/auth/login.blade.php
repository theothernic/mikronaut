@extends('app')
@section('title', $page->title)

@section('content')
    <div class="ct sm">
        <form id="frmAuthLogin" name="frmAuthLogin" method="post" action="{{ route('login.handle') }}">
            <h1>{{ $page->title }}</h1>

            <div class="control">
                <label for="txtLoginEmail">Email Address</label>
                <input type="text" id="txtLoginEmail" name="email" />
            </div>

            <div class="control">
                <label for="txtLoginPass">Password</label>
                <input type="password" id="txtLoginPass" name="password" />
            </div>

            <div class="actions">
                <button id="cmdLogin" type="submit">Log in</button>
            </div>
            @csrf
        </form>
    </div>


@endsection
