@extends('layouts/main-layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <a href="/" class="title m-b-md">
                Marichka
                <div class="subtitle">
                    smart bikes
                </div>
            </a>


            <div class="links">
                <a href="/">More info coming soon</a>
{{--                <a href="/about">About</a>--}}
{{--                <a href="/services">Services</a>--}}
{{--                <a href="/shop">Shop</a>--}}
{{--                <a href="/news">News</a>--}}
{{--                <a href="/invest">Invest</a>--}}
{{--                <a href="/contacts">Contacts</a>--}}
            </div>
        </div>
    </div>
@endsection
