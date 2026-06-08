@extends('layouts.app')

@section('content')

<h2>Purchase History</h2>

<table border="1">
    <tr>
        <th>Supplier</th>
        <th>Product</th>
        <th>Quantity</th>
    </tr>

    @foreach($purchases as $purchase)
    <tr>
        <td>{{ $purchase->supplier->name }}</td>
        <td>{{ $purchase->product->name }}</td>
        <td>{{ $purchase->quantity }}</td>
    </tr>
    @endforeach

</table>

@endsection