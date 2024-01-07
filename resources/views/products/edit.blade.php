@extends('layout.index') <!-- Use your layout file -->

@section('content')
    <div class="container mt-4">
        <div class="my-2">
            <a href="{{url('/')}}"> Back Home</a>
        </div>
        <h1>Edit a Product</h1>
        <form method="POST" action="{{ route('products.update',$productFind->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$productFind->name}}">
                <div class="invalid-feedback">
                    Please provide a name.
                </div>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$productFind->quantity}}" required>
                <div class="invalid-feedback">
                    Please provide a quantity.
                </div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$productFind->price}}" required>
                <div class="invalid-feedback">
                    Please provide a price.
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" value="{{$productFind->status}}" required>
                    <option value="Buy">Buy</option>
                    <option value="Sold">Sold</option>
                </select>
                <div class="invalid-feedback">
                    Please select a status.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>

        </form>
    </div>
@endsection
