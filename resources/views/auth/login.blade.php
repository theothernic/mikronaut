@extends('app')
@section('title', $page->title)

@section('content')
    <div class="container">
        <form id="frmAuthLogin" name="frmAuthLogin" method="post" action="{{ route('login.handle') }}">
            @csrf

            <h1>{{ $page->title }}</h1>

            <div class="actions">

                <div class="control">
                    <label for="txtLoginEmail">Email Address</label>
                    <input type="text" id="txtLoginEmail" name="email" />
                </div>

                <div class="control">
                    <label for="txtLoginPass">Password</label>
                    <input type="password" id="txtLoginPass" name="password" />
                </div>

                <button>Log in</button>
            </div>
        </form>
    </div>


@endsection
