@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">Edit Sale</h3>
        <small class="text-muted">Update sale transaction details</small>
    </div>
    <div>
        <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary btn-sm">Back to Sales</a>
    </div>
</div>

<div class="card card-soft">
    <div class="card-body">
        <form action="{{ route('sales.update', $sale->id) }}" method="POST" id="saleEditForm">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Product</label>
                    <select name="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                        <option value="">Select a product</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id', $sale->product_id) == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $sale->quantity) }}" class="form-control @error('quantity') is-invalid @enderror" min="1" required>
                    @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sale Price (₹)</label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $sale->sale_price) }}" class="form-control @error('sale_price') is-invalid @enderror" required>
                    </div>
                    @error('sale_price')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sale Date</label>
                    <input type="date" name="sale_date" value="{{ old('sale_date', $sale->sale_date ?? date('Y-m-d')) }}" class="form-control @error('sale_date') is-invalid @enderror">
                    @error('sale_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="3">{{ old('notes', $sale->notes) }}</textarea>
                    @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="bi bi-check-lg me-1"></i>Update Sale
                        </button>
                        <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('saleEditForm')?.addEventListener('submit', function() {
        document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
    });
</script>

@endsection