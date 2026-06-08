@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Purchases</h3>
        <small class="text-muted">Track purchase history and supplier orders</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Purchase
        </a>
    </div>
</div>

<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex w-100 w-md-auto">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search purchases...">
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
                        <th class="ps-4">Date</th>
                        <th>Supplier</th>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Purchase Price</th>
                        <th class="text-end pe-4">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $purchase)
                    <tr>
                        <td class="ps-4">{{ $purchase->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="fw-bold">{{ $purchase->supplier->name ?? '-' }}</span>
                        </td>
                        <td>
                            <span>{{ $purchase->product->name ?? '-' }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary">{{ $purchase->quantity }}</span>
                        </td>
                        <td class="text-end">₹ {{ number_format($purchase->purchase_price, 2) }}</td>
                        <td class="text-end fw-bold">₹ {{ number_format($purchase->quantity * $purchase->purchase_price, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="p-4 text-center">
                                <h5 class="mb-1">No purchases found</h5>
                                <p class="text-muted mb-3">Record your first purchase to start tracking inventory.</p>
                                <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm">Add Purchase</a>
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
    <div class="text-muted small">
        Showing {{ $purchases->firstItem() ?? 0 }} to {{ $purchases->lastItem() ?? 0 }} of {{ $purchases->total() ?? 0 }} purchases
    </div>
    <div>
        {{ $purchases->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection