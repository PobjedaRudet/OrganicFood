@include('partials.header')
@include('partials.menu')
<div class="container mt-5 pt-5" style="padding-top: 200px;">
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        @php $total = 0; @endphp
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $qty)
                    @php
                        $product = \App\Models\Product::find($id);
                        $subtotal = $product ? $product->price * $qty : 0;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $product ? $product->name : 'Unknown' }}</td>
                        <td>${{ $product ? number_format($product->price, 2) : '0.00' }}</td>
                        <td>{{ $qty }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end mb-3">
            <h4>Total: <span class="text-primary">${{ number_format($total, 2) }}</span></h4>
        </div>
        <div class="text-end">
           <a href="{{ route('order') }}" class="btn btn-success btn-lg rounded-pill">Naruči</a>
        </div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">Clear Cart</button>
        </form>
    @endif
    <a href="{{ url('product') }}" class="btn btn-secondary mt-3">Back to Products</a>
</div>
@include('partials.footer')
