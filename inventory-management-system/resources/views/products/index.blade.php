@extends('layouts.app')

@section('content')

<h2>Products</h2>

<a href="{{ route('products.create') }}">
    Add Product
</a>

<br><br>

<form method="GET">
    <input type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search Product">

    <button type="submit">Search</button>
</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                width="80">
            @endif
        </td>

        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->stock }}</td>
    </tr>

    <td>
        <a href="{{ route('products.edit', $product->id) }}">
            Edit
        </a>

        <form action="{{ route('products.destroy', $product->id) }}"
            method="POST"
            style="display:inline;">

            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Delete this product?')">
                Delete
            </button>

        </form>
    </td>
    @endforeach

</table>

<br>

{{ $products->links() }}

@endsection