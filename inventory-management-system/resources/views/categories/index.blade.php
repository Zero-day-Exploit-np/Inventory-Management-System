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

<h2>Categories</h2>

<a href="{{ route('categories.create') }}">
    Add Category
</a>

<ul>
    @foreach($categories as $category)
    <li>{{ $category->name }}</li>
    @endforeach
</ul>
@endsection