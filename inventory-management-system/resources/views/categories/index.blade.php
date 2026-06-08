<!-- <h1>Categories Page</h1>

<a href="{{ route('categories.create') }}">Add Category</a>
@foreach($categories as $category)
<li>
    {{ $category->name }}

    <a href="{{ route('categories.edit', $category->id) }}">
        Edit
    </a>

    <form action="{{ route('categories.destroy', $category->id) }}"
        method="POST"
        style="display:inline;">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>
</li>
@endforeach -->






@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Categories</h3>
        <small class="text-muted">Organize products by categories</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Category
        </a>
    </div>
</div>

<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex w-100 w-md-auto">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search categories...">
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
                        <th>Description</th>
                        <th class="text-center">Products</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">{{ $category->name }}</div>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($category->description, 60) }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info">{{ $category->products_count ?? 0 }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this category?');">
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
                        <td colspan="4">
                            <div class="p-4 text-center">
                                <h5 class="mb-1">No categories found</h5>
                                <p class="text-muted mb-3">Add your first category to organize products.</p>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection