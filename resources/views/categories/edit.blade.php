@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">Edit Category</h3>
        <small class="text-muted">Update category information</small>
    </div>
    <div>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">Back to Categories</a>
    </div>
</div>

<div class="card card-soft">
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" id="categoryEditForm">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $category->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="bi bi-check-lg me-1"></i>Update Category
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('categoryEditForm')?.addEventListener('submit', function() {
        document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
    });
</script>

@endsection