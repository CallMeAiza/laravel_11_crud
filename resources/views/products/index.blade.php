@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @session('success')
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Product List</h5>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Add New Product
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col" style="width: 15%">Image</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 30%">Description</th>
                                <th scope="col" style="width: 10%">Price</th>
                                <th scope="col" style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                                                class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                style="width: 80px; height: 80px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-medium">{{ $product->name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ Str::limit($product->description, 100) }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success">
                                            ₱{{ number_format($product->price, 2) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('products.show', $product->id) }}" 
                                                class="btn btn-outline-primary btn-sm" 
                                                title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" 
                                                class="btn btn-outline-secondary btn-sm" 
                                                title="Edit Product">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" 
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                    onclick="return confirm('Are you sure you want to delete this product?');"
                                                    title="Delete Product">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            <strong>No Products Found</strong>
                                            <p class="mb-0">Start by adding your first product!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .table > :not(caption) > * > * {
        padding: 1rem;
    }
    .btn-group .btn {
        padding: 0.375rem 0.75rem;
    }
    .btn-group .btn i {
        font-size: 0.875rem;
    }
    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
    }
    .bg-success-subtle {
        background-color: #dcfce7;
    }
    .pagination {
        margin-bottom: 0;
    }
    .pagination .page-link {
        border-radius: 0.5rem;
        margin: 0 0.25rem;
        border: none;
        color: #4f46e5;
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        border: none;
    }
</style>
@endpush
@endsection
