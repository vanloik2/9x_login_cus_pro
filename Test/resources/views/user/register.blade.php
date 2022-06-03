@extends('app');
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{ $err }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('register_action') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="user_name">Username<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="user_name" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="password">Password Confimation<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="c_password" placeholder="Password Confimation">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a href="{{ route('home_page')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection