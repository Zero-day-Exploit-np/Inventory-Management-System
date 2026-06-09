@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Sales</h3>
        <small class="text-muted">Track and manage sales transactions</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Sale
        </a>
    </div>
</div>

<!-- SEARCH -->
<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex w-100 w-md-auto">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search"></i>
            </span>

            <input type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control border-start-0"
                placeholder="Search sales...">

            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <div class="d-flex gap-2">
        <a href="{{ url()->current() }}" class="btn btn-outline-secondary btn-sm">Reset</a>
    </div>
</div>

<!-- TABLE -->
<div class="card card-soft mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th class="ps-4">Date</th>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Sale Price</th>
                        <th class="text-end">Total</th>
                        <th class="text-end">Profit</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($sales as $sale)
                    <tr>
                        <td class="ps-4">
                            {{ $sale->created_at->format('M d, Y') }}
                        </td>

                        <td>
                            <span class="fw-bold">
                                {{ $sale->product->name ?? '-' }}
                            </span>
                            <br>
                            <small class="text-muted">
                                SKU: {{ $sale->product->sku ?? '-' }}
                            </small>
                        </td>

                        <td class="text-center">
                            <span class="badge bg-info">
                                {{ $sale->quantity }}
                            </span>
                        </td>

                        <td class="text-end">
                            ₹ {{ number_format($sale->selling_price, 2) }}
                        </td>

                        <td class="text-end fw-bold">
                            ₹ {{ number_format($sale->quantity * $sale->selling_price, 2) }}
                        </td>

                        <td class="text-end text-success">
                            ₹ {{ number_format($sale->profit ?? 0, 2) }}
                        </td>

                        <td class="text-end pe-4">

                            <!-- PDF Invoice -->
                            <a href="{{ route('sales.invoice', $sale->id) }}"
                                class="btn btn-sm btn-success me-2">
                                PDF
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('sales.edit', $sale->id) }}"
                                class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('sales.destroy', $sale->id) }}"
                                method="POST"
                                class="d-inline-block"
                                onsubmit="return confirm('Delete this sale?');">

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
                        <td colspan="7">
                            <div class="p-4 text-center">
                                <h5 class="mb-1">No sales found</h5>
                                <p class="text-muted mb-3">
                                    Record your first sale to get started.
                                </p>
                                <a href="{{ route('sales.create') }}"
                                    class="btn btn-primary btn-sm">
                                    Add Sale
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>

<!-- PAGINATION -->
<div class="d-flex justify-content-between align-items-center">
    <div class="text-muted small">
        Showing {{ $sales->firstItem() ?? 0 }}
        to {{ $sales->lastItem() ?? 0 }}
        of {{ $sales->total() ?? 0 }} sales
    </div>

    <div>
        {{ $sales->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection