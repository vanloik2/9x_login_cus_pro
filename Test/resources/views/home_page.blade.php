@extends('app');
@section('content')
    <div class="home_page">
        @auth
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <p>
                Hello <b> {{ Auth::user()->user_name }} </b>
            </p>
            <a href="{{ route('change_pw') }}" class="btn btn-primary">Change Password</a>
            <a href="{{ route('logout')}}" class="btn btn-danger">Logout</a>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-info">Register</a>
        @endguest
    </div>
@endsection
