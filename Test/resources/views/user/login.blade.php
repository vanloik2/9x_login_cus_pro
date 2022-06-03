@extends('app');
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if (session('password'))
                <div class="alert alert-danger">
                    {{ session('password') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{ $err }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('login_action') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                    <a href="{{ route('home_page') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
