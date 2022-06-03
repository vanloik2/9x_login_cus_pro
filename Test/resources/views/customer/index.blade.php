@extends('app');
@section('content')
    <div>
        @if (session('success'))
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            <div>
                <form action="" method="get">
                    <div class="row row-cols-auto g-1">
                        <div class="col">
                            <input type="text" name="txt_search" value="{{ $txt_search }}" class="form-control"
                                placeholder="Search here...">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">Refresh</button>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.create') }}" class="btn btn-primary">Add</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Customer Name</th>
                        <th>Contact Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->contact_name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('customer.edit', $customer->customer_id) }}">Edit</a>
                                <form action="{{ route('customer.destroy', $customer->customer_id) }}" method="post"
                                    onsubmit="return confirm('Confirm delete !')" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
@endsection
