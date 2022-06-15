@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <form method="GET" action="{{ route('order-detail.index') }}">
                <div class="row row-cols-auto">
                    <div class="col">
                        <select name="category_id" class="form-select" >
                            <option value="">All Categories</option>
                            @foreach ($categories as $item)
                            @if($item->category_id == $category_id)
                                <option value="{{ $item->category_id }}" selected >{{ $item->category_name }}</option>
                                @else
                                <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="txt_search" value="{{ $txt_search }}" class="form-control"
                            placeholder="Search here...">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>OrderID</th>
                        <th>OrderDate</th>
                        <th>CustomerID</th>
                        <th>CustomerName</th>
                        <th>ProductID</th>
                        <th>ProductName</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ date('D M Y', strtotime($item->order_date)) }}</td>
                            <td>{{ $item->customer_id }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $order_details->links() }}
        </div>
    </div>
@endsection
