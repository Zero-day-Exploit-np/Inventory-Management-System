@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Suppliers</h3>
        <small class="text-muted">Manage supplier information and contact details</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Supplier
        </a>
    </div>
</div>

<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex w-100 w-md-auto">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search by name, email, phone...">
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
                        <th class="ps-4">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">{{ $supplier->name }}</div>
                        </td>
                        <td>
                            <a href="mailto:{{ $supplier->email }}" class="text-decoration-none">{{ $supplier->email ?? '-' }}</a>
                        </td>
                        <td>
                            <a href="tel:{{ $supplier->phone }}" class="text-decoration-none">{{ $supplier->phone ?? '-' }}</a>
                        </td>
                        <td>
                            <small class="text-muted">{{ $supplier->address ?? '-' }}</small>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this supplier?');">
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
                                <h5 class="mb-1">No suppliers found</h5>
                                <p class="text-muted mb-3">Add your first supplier to get started.</p>
                                <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm">Add Supplier</a>
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
        Showing {{ $suppliers->firstItem() ?? 0 }} to {{ $suppliers->lastItem() ?? 0 }} of {{ $suppliers->total() ?? 0 }} suppliers
    </div>
    <div>
        {{ $suppliers->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>



{{ $suppliers->links() }}




@endsection