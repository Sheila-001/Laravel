@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>Product Details</span>
                <a href="{{ route('products.index') }}" class="btn btn-light btn-sm text-primary fw-bold">&larr; Back</a>
            </div>
            <div class="card-body bg-white">
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Code:</label>
                    <div class="col-md-6 pt-2">
                        {{ $product->code }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Name:</label>
                    <div class="col-md-6 pt-2">
                        {{ $product->name }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Quantity:</label>
                    <div class="col-md-6 pt-2">
                        {{ $product->quantity }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Price:</label>
                    <div class="col-md-6 pt-2">
                        ${{ number_format($product->price, 2) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Description:</label>
                    <div class="col-md-6 pt-2">
                        {{ $product->description }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-4 col-form-label text-md-end text-start fw-bold">Product Image:</label>
                    <div class="col-md-6 pt-2">
                        @if($product->file)
                            <div class="product-image-container">
                                <img src="{{ asset('storage/uploads/' . $product->file) }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-fluid rounded shadow-sm" 
                                     style="max-width: 300px; max-height: 300px; object-fit: contain;">
                                <!-- <div class="mt-2">
                                    <a href="{{ asset('storage/uploads/' . $product->file) }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-outline-primary">
                                        View Full Size
                                    </a>
                                </div> -->
                            </div>
                        @else
                            <div class="text-muted">
                                <i class="fas fa-image me-2"></i>No image available
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary text-white fw-bold">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.product-image-container {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
    text-align: center;
}

.product-image-container img {
    transition: transform 0.3s ease;
}

.product-image-container img:hover {
    transform: scale(1.05);
}
</style>
@endsection