@extends('app');
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if (session('password'))
                <div class="alert alert-danger">
                    {{ session('password') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{ $err }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('change_pw') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="old_password">Old Password<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="old_password" placeholder="Old Password">
                </div>
                <div class="mb-3">
                    <label for="password"> New Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                </div>
                <div class="mb-3">
                    <label for="c_password">Password Confirmation<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Change</button>
                    <a href="{{ route('home_page') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
