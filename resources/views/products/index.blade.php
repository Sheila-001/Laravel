@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>Product List</span>
                <div class="d-flex gap-2">
                    <a href="{{ route('products.create') }}" class="btn btn-light btn-sm text-primary fw-bold">+ Add Product</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm text-primary fw-bold">Logout</button>
                    </form>
                </div>
            </div>
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th>Image</th>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    @if($product->file)
                                        <img src="{{ asset('storage/uploads/' . $product->file) }}" alt="{{ $product->name }}" style="max-width: 80px; max-height: 80px;">
                                    @else
                                        <span>No image</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-end">${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm text-white fw-bold">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary btn-sm fw-bold">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-secondary">No products found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
