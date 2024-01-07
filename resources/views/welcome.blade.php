@extends('layout.index')

@section('content')
    <section>
        <div class="container">
            {{-- four card for sale report start --}}
            <div class="row my-5">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Today's Sales</h5>
                            <p class="card-text">${{ $productTodaySales }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Yesterday's Sales</h5>
                            <p class="card-text">${{ $productYesterdaySales }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">This Month's Sales</h5>
                            <p class="card-text">${{ $productThisMonthSales }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Last Month's Sales</h5>
                            <p class="card-text">${{ $productLastMonthSales }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- four card for sale report end --}}
            <div class="row">
                <!-- Button on the left side to show all sold products -->
                <div class="col-6 text-start">
                    <a href="{{ route('products.sold') }}" type="button" class="btn btn-primary">Show Sold Products</a>
                </div>

                <!-- Button on the right side to add new products -->
                <div class="col-6 text-end">
                    <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">Add New Product</a>
                </div>
            </div>

            {{-- product table start --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row"> {{ $key + 1 }} </th>
                            <td>{{ $product->name }}</td>
                            <td> {{ $product->quantity }} </td>
                            <td>${{ $product->price }}</td>
                            <td>
                                {{-- <a href="{{route('products.updateStatusChange',$product->id)}}"@if ($product->status === 'sold')
                                disabled
                            @endif  type="button" class="btn btn-sm btn-info">{{$product->status}}</a> --}}
                                <form method="POST" action="{{ route('products.updateStatusChange', $product->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button @if ($product->status === 'Sold') disabled @endif type="submit"
                                        class="btn btn-sm btn-info">
                                        {{ $product->status }}
                                    </button>
                                </form>

                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('products.edit', $product->id) }}" type="button"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                        class="ml-2">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more rows here as needed -->
                </tbody>
            </table>
            {{-- table end --}}

        </div>
    </section>
@endsection
