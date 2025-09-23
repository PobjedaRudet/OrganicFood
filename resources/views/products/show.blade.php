@include('partials.header')
@include('partials.menu')
<div class="container mt-5">
    <h1>{{ $product->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-3">
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Category:</strong> {{ $product->category }}</p>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@include('partials.footer')
