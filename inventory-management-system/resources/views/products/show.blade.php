@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">{{ $product->name }}</h3>
        <small class="text-muted">Product Details</small>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-pencil me-1"></i>Edit
        </a>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Back to Products</a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card card-soft mb-3">
            <div class="card-body p-0">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-100" style="height: 300px; object-fit: cover; border-radius: 8px 8px 0 0;">
                @else
                <div style="height: 300px; background: var(--surface-muted); display: flex; align-items: center; justify-content: center; border-radius: 8px 8px 0 0;">
                    <i class="bi bi-image" style="font-size: 3rem; color: var(--text-muted);"></i>
                </div>
                @endif
                <div class="p-3">
                    <div class="mb-2">
                        @if($product->stock == 0)
                        <span class="badge bg-danger">Out of Stock</span>
                        @elseif($product->stock < 5)
                            <span class="badge bg-warning text-dark">Low Stock</span>
                            @else
                            <span class="badge bg-success">In Stock</span>
                            @endif
                    </div>
                    <div class="text-muted small mb-3">SKU: <strong>{{ $product->sku }}</strong></div>
                    <h5 class="mb-2">Quick Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><small class="text-muted">Stock Level</small><br><strong>{{ $product->stock }} units</strong></li>
                        <li><small class="text-muted">Category</small><br><strong>{{ $product->category->name ?? 'Uncategorized' }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Pricing</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Purchase Price</small>
                    <h4 class="mb-0">₹ {{ number_format($product->purchase_price, 2) }}</h4>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Selling Price</small>
                    <h4 class="mb-0">₹ {{ number_format($product->selling_price, 2) }}</h4>
                </div>
                <div>
                    <small class="text-muted d-block">Margin</small>
                    <div>
                        <h5 class="mb-0">
                            <span class="badge bg-info">
                                {{ $product->purchase_price > 0 ? number_format(((($product->selling_price - $product->purchase_price) / $product->purchase_price) * 100), 1) : 0 }}%
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card card-soft mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Product Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Product Name</small>
                        <h6 class="mb-0">{{ $product->name }}</h6>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Category</small>
                        <h6 class="mb-0">{{ $product->category->name ?? 'Not assigned' }}</h6>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">SKU</small>
                        <h6 class="mb-0"><code>{{ $product->sku }}</code></h6>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Stock Level</small>
                        <h6 class="mb-0">{{ $product->stock }} units</h6>
                    </div>
                </div>

                @if($product->description)
                <div class="mb-3">
                    <small class="text-muted d-block mb-2">Description</small>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                @endif
            </div>
        </div>

        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Stock Activity</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr class="border-bottom">
                                <th class="text-muted small">Type</th>
                                <th class="text-muted small">Quantity</th>
                                <th class="text-muted small">Date</th>
                                <th class="text-muted small">Reference</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product->purchases as $purchase)
                            <tr>
                                <td><span class="badge bg-info">Purchase</span></td>
                                <td>+{{ $purchase->quantity }}</td>
                                <td>{{ $purchase->created_at->format('M d, Y') }}</td>
                                <td>{{ $purchase->supplier->name ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted small py-3">No purchase history</td>
                            </tr>
                            @endforelse

                            @forelse($product->sales as $sale)
                            <tr>
                                <td><span class="badge bg-success">Sale</span></td>
                                <td>-{{ $sale->quantity }}</td>
                                <td>{{ $sale->created_at->format('M d, Y') }}</td>
                                <td>Sale #{{ $sale->id }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted small py-3">No sales history</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <div class="alert alert-light border">
                <small class="text-muted">
                    <strong>Created:</strong> {{ $product->created_at->format('M d, Y H:i') }} |
                    <strong>Last Updated:</strong> {{ $product->updated_at->format('M d, Y H:i') }}
                </small>
            </div>
        </div>
    </div>
</div>

<style>
    .card-soft {
        background-color: var(--surface);
    }
</style>

@endsection