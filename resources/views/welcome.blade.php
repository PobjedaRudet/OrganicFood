<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.header')
@include('partials.menu')

<style>
/* Responsive tweaks for the home page */
@media (max-width: 576px) {
    .carousel-caption { left: 0; right: 0; padding: 1rem; }
    .carousel-caption .btn { padding: .5rem 1rem; font-size: .95rem; }
    .hero-title { font-size: 2rem; }
}
@media (min-width: 577px) and (max-width: 991.98px) {
    .hero-title { font-size: 2.6rem; }
}
@media (min-width: 992px) {
    .hero-title { font-size: 3.5rem; }
}
.product-item img { height: 220px; }
@media (max-width: 576px) {
    .product-item img { height: 160px; }
}
</style>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Organska hrana - slajd 1" loading="lazy">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="hero-title mb-5 animated slideInDown">Organska hrana je najbolja za zdravlje</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Proizvodi</a>
                                <a href="{{ url('/blog') }}" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Vijesti</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Domaća hrana - slajd 2" loading="lazy">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="hero-title mb-5 animated slideInDown">Domaća hrana je uvijek zdrava</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-3 p-lg-5 pe-lg-0">
                    <img class="img-fluid w-100" src="img/pcelarstvo.jpg" alt="Organska proizvodnja - pčelarstvo" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Najbolji domaći ljekoviti med</h1>
                <p class="mb-4">Biramo najbolje lokalne proizvođače i isporučujemo svježe, sezonske namirnice uz potpunu sljedivost – za zdraviji život i bolji ukus.</p>
                <p><i class="fa fa-check text-primary me-3"></i>100% organsko, bez pesticida</p>
                <p><i class="fa fa-check text-primary me-3"></i>Svježe, sezonsko i lokalno</p>
                <p><i class="fa fa-check text-primary me-3"></i>Pažljivo birana kvaliteta</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="{{ url('/about') }}">Saznaj više</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


{{--  <!-- Feature Start -->
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Po čemu smo poznati</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="img/icon-1.png" alt="Natural Process ikona" loading="lazy">
                    <h4 class="mb-3">Natural Process</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="img/icon-2.png" alt="Organic Products ikona" loading="lazy">
                    <h4 class="mb-3">Organic Products</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="img/icon-3.png" alt="Biologically Safe ikona" loading="lazy">
                    <h4 class="mb-3">Biologically Safe</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->  --}}

<!-- Product Start -->
<section class="py-5" style="background: #f7f8fa;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 mb-2">Naši proizvodi</h1>
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
                                <img class="img-fluid w-100" src="{{ asset($product->image ?? 'img/default.jpg') }}" alt="{{ $product->name }}" style="height:220px;object-fit:cover;" loading="lazy">
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



<!-- Firm Visit Start -->
<div class="container-fluid bg-primary bg-icon mt-5 py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 text-white mb-3">Posjetite našu firmu</h1>
                <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
            </div>
            <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Firm Visit End -->


{{--  <!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-6 mb-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Customer Review</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->  --}}


<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Vijesti</h1>
            <p>Najnovije vijesti iz svijeta pčelarstva – saznajte sve o inovacijama, zdravlju pčela, organskoj proizvodnji meda i lokalnim događajima vezanim za pčelarske zajednice.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="img/blog-1.jpg" alt="Blog 1" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" src="img/blog-2.jpg" alt="Blog 2" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <img class="img-fluid" src="img/blog-3.jpg" alt="Blog 3" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
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

@if (Route::has('login'))
<div class="h-14.5 hidden lg:block"></div>
@endif
</body>
</html>
