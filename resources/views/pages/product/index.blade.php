@extends('layouts.app')

@section('styles')
    <style>
        .table-container {
            max-width: 800px;
            margin: 50px auto;
        }

        .pagination-container {
            max-width: 10000px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




    <div class="container table-container">
        <h1 class="text-center mb-4">Product List</h1>

        <!-- Add Product Button -->
        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
        </div>


        <div class="mb-3">
            <form action="{{ route('products.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search products..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <!-- Product Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div class="d-inline-flex align-items-center">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-primary btn-sm me-1">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="pagination-container d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                {{ $products->links() }}
            </nav>
        </div>

    </div>



    <script>
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }
        }, 2000); // milliseconds
    </script>
@endsection
