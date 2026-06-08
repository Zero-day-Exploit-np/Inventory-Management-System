@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Products</h3>
        <small class="text-muted">Manage inventory products and stock</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Product
        </a>
    </div>
</div>

<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex w-100 w-md-auto">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search products, SKU, category...">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <div class="d-flex gap-2">
        <a href="{{ url()->current() }}" class="btn btn-outline-secondary btn-sm">Reset</a>
    </div>
</div>

<div class="card card-soft mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Product</th>
                        <th>Category</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Price</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width:64px; height:64px; overflow:hidden; border-radius:.6rem; background:#f3f4f6; display:flex; align-items:center; justify-content:center;">
                                    @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%; height:100%; object-fit:cover;">
                                    @else
                                    <i class="bi bi-image text-muted fs-3"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $product->name }}</div>
                                    <div class="small text-muted">SKU: {{ $product->sku ?? '-' }}</div>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="badge badge-outline small">{{ $product->category->name ?? '-' }}</span>
                        </td>

                        <td class="text-center">
                            @if($product->stock <= 0)
                                <span class="badge bg-danger">Out</span>
                                @elseif($product->stock <= 5)
                                    <span class="badge bg-warning text-dark">Low ({{ $product->stock }})</span>
                                    @else
                                    <span class="badge bg-success">{{ $product->stock }}</span>
                                    @endif
                        </td>

                        <td class="text-center">

                            @if($product->stock == 0)
                            <span class="badge bg-danger">
                                Out of Stock
                            </span>

                            @elseif($product->stock <= 5)
                                <span class="badge bg-warning text-dark">
                                Low Stock
                                </span>

                                @else
                                <span class="badge bg-success">
                                    In Stock
                                </span>

                                @endif

                        </td>


                        <td class="text-end">₹ {{ number_format($product->selling_price, 2) }}</td>

                        <td class="text-end pe-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="p-4 text-center">
                                <h5 class="mb-1">No products found</h5>
                                <p class="text-muted mb-3">Add your first product to start managing inventory.</p>
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add Product</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() ?? 0 }} products
    </div>
    <div>
        {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection