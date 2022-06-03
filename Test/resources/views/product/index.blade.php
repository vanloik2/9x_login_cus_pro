@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="" method="get">
                <div class="row row-cols-auto g-1">
                    <div class="col">
                        <input type="text" name="txt_search" value="{{ $txt_search }}" placeholder="Search here..." class="form-control">
                    </div>
                    <div class="col">
                        <button class="btn btn-success">Refresh</button>
                    </div>
                    <div class="col">
                        <a href="{{ route('product.create') }}" class="btn btn-warning">Add</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}"
                                    width="100">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('product.edit', $product->product_id) }}">Edit</a>
                                <form action="{{ route('product.destroy', $product->product_id) }}" method="post"
                                    onsubmit="return confirm('Confirm delete !')" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
