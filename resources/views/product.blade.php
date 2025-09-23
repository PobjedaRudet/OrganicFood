@include('partials.header')
@include('partials.menu')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Product Start -->
<section class="py-5" style="background: #f7f8fa;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 mb-2">Our Products</h1>
                <p class="text-muted">Browse our fresh selection. Click on a product for details or add to cart.</p>
            </div>
            {{--  <div class="col-lg-4 text-end">
                <ul class="nav nav-pills d-inline-flex justify-content-end">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Vegetable</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
                    </li>
                </ul>
            </div>  --}}
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show active">
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm border-0 product-item" style="transition: box-shadow .2s;">
                            <div class="position-relative bg-light overflow-hidden rounded-top">
                                <img class="img-fluid w-100" src="{{ asset($product->image ?? 'img/default.jpg') }}" alt="{{ $product->name }}" style="height:220px;object-fit:cover;">
                                <span class="badge bg-secondary position-absolute start-0 top-0 m-2 py-1 px-3">New</span>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-2">{{ $product->name }}</h5>
                                <p class="text-muted mb-1">{{ $product->category }}</p>
                                <div class="mb-2">
                                    <span class="text-primary fw-bold fs-5">${{ $product->price }}</span>
                                </div>
                                <button type="button" class="btn btn-outline-success btn-sm rounded-pill add-to-cart-btn" data-id="{{ $product->id }}"><i class="fa fa-shopping-bag me-1"></i>Add to cart</button>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm rounded-pill ms-2"><i class="fa fa-eye me-1"></i>View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

</div>
</div>


</div>
</div>
</div>
</div>
</div>
<!-- Product End -->


<!-- Firm Visit Start -->
<div class="container-fluid bg-primary bg-icon mt-5 py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
            </div>
            <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Firm Visit End -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.add-to-cart-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                fetch('/cart/add/' + productId, {
                        method: 'POST'
                        , headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            , 'Accept': 'application/json'
                        , }
                    , })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Prikaz poruke
                            alert('Proizvod je dodan u korpu!');
                            // Dinamičko ažuriranje broja na ikonici cart
                            const cartBadge = document.querySelector('.fa-shopping-bag').parentElement.querySelector('.badge');
                            if (cartBadge) {
                                cartBadge.textContent = data.cart_count;
                                cartBadge.style.display = data.cart_count > 0 ? 'inline-block' : 'none';
                            } else {
                                // Ako badge ne postoji, dodaj ga
                                const cartIcon = document.querySelector('.fa-shopping-bag').parentElement;
                                const badge = document.createElement('span');
                                badge.className = 'position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger';
                                badge.style.fontSize = '0.7rem';
                                badge.textContent = data.cart_count;
                                cartIcon.appendChild(badge);
                            }
                        } else {
                            alert('Greška pri dodavanju u korpu.');
                        }
                    })
                    .catch(() => alert('Greška pri komunikaciji sa serverom.'));
            });
        });
    });

</script>

@include('partials.footer')
