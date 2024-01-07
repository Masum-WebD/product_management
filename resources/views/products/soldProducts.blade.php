@extends('layout.index')

@section('content')
 <section class="container mt-5">
    <h3>Sold Products</h3>
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
        @foreach($productsSold as $key => $product)
            <tr>
                <th scope="row"> {{$key + 1}} </th>
                <td>{{$product->name}}</td>
                <td> {{$product->quantity}} </td>
                <td>$ {{$product->price}}</td>
                <td>{{$product->status}}</td>
                <td>
                    <a href="{{route('products.edit',$product->id)  }}" type="button" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('products.destroy', $product->id)}}" type="button" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
            <!-- Add more rows here as needed -->
        </tbody>
    </table>
    <div class="my-4 mx-auto text-center">
        <a href="{{url('/')}}"> Back Home</a>
    </div>
 </section>
@endsection
