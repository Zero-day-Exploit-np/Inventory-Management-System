@extends('layouts.app')

@section('content')

<h2>Add Purchase</h2>

<form action="{{ route('purchases.store') }}" method="POST">
    @csrf

    <label>Supplier</label>
    <select name="supplier_id">
        @foreach($suppliers as $supplier)
        <option value="{{ $supplier->id }}">
            {{ $supplier->name }}
        </option>
        @endforeach
    </select>

    <br><br>

    <label>Product</label>
    <select name="product_id">
        @foreach($products as $product)
        <option value="{{ $product->id }}">
            {{ $product->name }}
        </option>
        @endforeach
    </select>

    <br><br>

    <label>Quantity</label>
    <input type="number" name="quantity">

    <br><br>

    <label>Purchase Price</label>
    <input type="number" step="0.01" name="purchase_price">

    <br><br>

    <label>Purchase Date</label>
    <input type="date" name="purchase_date">

    <br><br>

    <button type="submit">Save Purchase</button>
</form>

@endsection