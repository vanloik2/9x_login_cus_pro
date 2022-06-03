@extends('app'),
@section('content')
    <div class="col-md-6">
        <div>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @endif
        </div>
        <form action="{{ route('customer.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="label-control">Customer Name</label>
                <input type="text" class="form-control" placeholder="Customer Name" name="customer_name">
            </div>
            <div class="mb-3">
                <label for="contact_name" class="label-control">Contact Name</label>
                <input type="text" class="form-control" placeholder="Contact Name" name="contact_name">
            </div>
            <div class="mb-3">
                <label for="address" class="label-control">Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="mb-3">
                <label for="city" class="label-control">City</label>
                <input type="text" class="form-control" placeholder="City" name="city">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
