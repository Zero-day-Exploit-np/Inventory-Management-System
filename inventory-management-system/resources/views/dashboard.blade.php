@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Products</h5>
                <h2>{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Categories</h5>
                <h2>{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Suppliers</h5>
                <h2>{{ $totalSuppliers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Stock Items</h5>
                <h2>{{ $totalStock }}</h2>
            </div>
        </div>
    </div>

</div>



<h3>Low Stock Products</h3>

<div class="card">
    <div class="card-header">
        Low Stock Products
    </div>

    <div class="card-body">

        @forelse($lowStockProducts as $product)

        <div class="alert alert-warning">
            {{ $product->name }}
            (Stock: {{ $product->stock }})
        </div>

        @empty

        <div class="alert alert-success">
            No low stock products.
        </div>

        @endforelse

    </div>
</div>

@endsection