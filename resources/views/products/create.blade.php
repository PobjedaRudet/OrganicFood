@include('partials.header')
@include('partials.menu')
<style>
    body { padding-top: 80px !important; }
</style>
<div class="container mt-5">
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">
        </div>
        <div class="mb-3">
            <label for="image_file" class="form-label">Upload Image</label>
            <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*">
            <small class="text-muted">Supported: JPG, PNG, WEBP, GIF. Max 4MB.</small>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@include('partials.footer')
