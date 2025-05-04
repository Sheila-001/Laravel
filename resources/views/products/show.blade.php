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
                    <div class="col-md-6 offset-md-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary text-white fw-bold">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection