@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Product Details</h5>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="product-image-container bg-light rounded-3 p-4 text-center">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" 
                                    alt="{{ $product->name }}" 
                                    class="img-fluid rounded-3 product-image shadow-sm">
                            @else
                                <div class="no-image-placeholder py-5">
                                    <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                    <p class="text-muted mt-3 mb-0">No image available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h2 class="mb-4">{{ $product->name }}</h2>
                            
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Description</h6>
                                <p class="mb-0">{{ $product->description }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Price</h6>
                                <h3 class="text-success mb-0">₱{{ number_format($product->price, 2) }}</h3>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <h6 class="text-muted mb-1">Created At</h6>
                                        <p class="mb-0">{{ $product->created_at->format('M d, Y H:i A') }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <h6 class="text-muted mb-1">Last Updated</h6>
                                        <p class="mb-0">{{ $product->updated_at->format('M d, Y H:i A') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                    class="btn btn-primary">
                                    <i class="bi bi-pencil me-1"></i> Edit Product
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="bi bi-trash me-1"></i> Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .product-image-container {
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-image {
        max-height: 350px;
        width: auto;
        object-fit: contain;
    }
    .product-details h2 {
        color: #1e293b;
        font-weight: 600;
    }
    .product-details h6 {
        font-size: 0.875rem;
        font-weight: 500;
    }
    .bg-light {
        background-color: #f8fafc !important;
    }
    .btn {
        padding: 0.625rem 1.25rem;
    }
    .btn i {
        font-size: 0.875rem;
    }
</style>
@endpush
@endsection

