@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">Dashboard</h3>
        <small class="text-muted">Welcome back, {{ auth()->user()->name }}!</small>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0 bg-primary text-white">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-white-75 small">Total Products</div>
                        <h2 class="mb-0">{{ $totalProducts }}</h2>
                    </div>
                    <div style="font-size: 2.5rem; opacity: .3;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="background: rgba(59, 130, 246, .08); border-left: 4px solid #3b82f6;">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Total Categories</div>
                        <h2 class="mb-0">{{ $totalCategories }}</h2>
                    </div>
                    <div style="font-size: 2.5rem; color: #3b82f6; opacity: .3;">
                        <i class="bi bi-tags"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="background: rgba(34, 197, 94, .08); border-left: 4px solid #22c55e;">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Total Suppliers</div>
                        <h2 class="mb-0">{{ $totalSuppliers }}</h2>
                    </div>
                    <div style="font-size: 2.5rem; color: #22c55e; opacity: .3;">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="background: rgba(168, 85, 247, .08); border-left: 4px solid #a855f7;">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Total Stock</div>
                        <h2 class="mb-0">{{ $totalStock }}</h2>
                    </div>
                    <div style="font-size: 2.5rem; color: #a855f7; opacity: .3;">
                        <i class="bi bi-graph-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card card-soft mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Stock Status Summary</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <span class="badge bg-success" style="width: 60px; height: 60px; font-size: 1.25rem; display: inline-flex; align-items: center; justify-content: center;">{{ $inStock ?? 0 }}</span>
                        </div>
                        <div class="text-muted small">In Stock</div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <span class="badge bg-warning text-dark" style="width: 60px; height: 60px; font-size: 1.25rem; display: inline-flex; align-items: center; justify-content: center;">{{ $lowStock ?? 0 }}</span>
                        </div>
                        <div class="text-muted small">Low Stock</div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <span class="badge bg-danger" style="width: 60px; height: 60px; font-size: 1.25rem; display: inline-flex; align-items: center; justify-content: center;">{{ $outOfStock ?? 0 }}</span>
                        </div>
                        <div class="text-muted small">Out of Stock</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-soft">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Low Stock Products</h5>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                @forelse($lowStockProducts as $product)
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <div class="flex-grow-1">
                        <div class="fw-bold">{{ $product->name }}</div>
                        <small class="text-muted">{{ $product->category->name ?? 'No Category' }}</small>
                    </div>
                    <div class="text-end">
                        @if($product->stock == 0)
                        <span class="badge bg-danger">Out</span>
                        @else
                        <span class="badge bg-warning text-dark">{{ $product->stock }} left</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center p-4">
                    <p class="text-muted mb-0">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>All products have adequate stock!
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-soft mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.create') }}" class="btn btn-outline-primary">
                        <i class="bi bi-plus-lg me-2"></i>Add Product
                    </a>
                    <a href="{{ route('purchases.create') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-cart-plus me-2"></i>Record Purchase
                    </a>
                    <a href="{{ route('sales.create') }}" class="btn btn-outline-success">
                        <i class="bi bi-currency-dollar me-2"></i>Record Sale
                    </a>
                    <a href="{{ route('suppliers.create') }}" class="btn btn-outline-info">
                        <i class="bi bi-people me-2"></i>Add Supplier
                    </a>


                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-info">
                        <i class="bi bi-tags me-2"></i> Categories
                    </a>
                    </li>
                    @endif
                </div>
            </div>
        </div>

        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">System Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted">User Role</small>
                    <div class="fw-bold">
                        <span class="badge bg-primary">{{ auth()->user()->role ?? 'User' }}</span>
                    </div>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Member Since</small>
                    <div class="fw-bold">{{ auth()->user()->created_at->format('M d, Y') }}</div>
                </div>
                <div>
                    <small class="text-muted">Last Login</small>
                    <div class="fw-bold">{{ now()->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection