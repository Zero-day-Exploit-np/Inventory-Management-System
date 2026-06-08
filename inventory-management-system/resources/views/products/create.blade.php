<h1>Add Product</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Category</label>
    <select name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
        @endforeach
    </select>

    <br><br>

    <label>Name</label>
    <input type="text" name="name">

    <br><br>

    <label>SKU</label>
    <input type="text" name="sku">

    <br><br>

    <label>Purchase Price</label>
    <input type="number" step="0.01" name="purchase_price">

    <br><br>

    <label>Selling Price</label>
    <input type="number" step="0.01" name="selling_price">

    <br><br>

    <label>Stock</label>
    <input type="number" name="stock">

    <br><br>

    <label>Description</label>
    <textarea name="description"></textarea>

    <br><br>
    <label>Product Image</label>
    <input type="file" name="image">

    <br><br>

    <button type="submit">Save Product</button>
</form>