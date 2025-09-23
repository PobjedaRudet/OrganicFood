@include('partials.header')
@include('partials.menu')

<style>
    body { padding-top: 125px !important; }
    .products-index-page .card { border-radius: 16px; }
    .products-index-page .card-header {
        border: none;
        border-radius: 16px 16px 0 0;
        background: linear-gradient(90deg, #9ace82 70%, #70e000 100%);
        color: #fff;
    }
    .products-index-page .table thead th {
        background: #f8fafc;
        border-bottom: 2px solid #e9ecef;
        color: #334155;
        font-weight: 600;
        white-space: nowrap;
    }
    .products-index-page .table tbody td { vertical-align: middle; }
    .products-index-page .badge-cat {
        background: #e6f9e7;
        color: #2b8a3e;
        border: 1px solid #b7e4c7;
    }
    .products-index-page .thumb {
        width: 64px; height: 64px; object-fit: cover; border-radius: 8px; border: 1px solid #e9ecef;
    }
    .products-index-page .action-btn { padding: .25rem .5rem; }
    .products-index-page .desc-col { max-width: 420px; }
</style>

<section class="products-index-page py-5">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <h2 class="h4 mb-0">Products</h2>
                    <small class="opacity-75">Manage your catalog</small>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-light text-success fw-semibold">
                    <i class="fa fa-plus me-1"></i> Add Product
                </a>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success m-3 mb-0">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th class="desc-col">Description</th>
                                <th>Category</th>
                                <th class="text-end">Price</th>
                                <th class="text-center" style="width: 180px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="thumb">
                                        @else
                                            <div class="text-muted">—</div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $product->name }}</td>
                                    <td class="text-muted">
                                        <div class="text-truncate" style="max-width: 420px;">{{ $product->description }}</div>
                                    </td>
                                    <td>
                                        @if($product->category)
                                            <span class="badge badge-cat">{{ $product->category }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-end">${{ $product->price }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-secondary btn-sm action-btn" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-primary btn-sm action-btn" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm action-btn" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        No products yet. Click <strong>Add Product</strong> to create your first item.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>

@include('partials.footer')
