@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- fields here -->

</form>

@endsection