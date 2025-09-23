<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.header')
@include('partials.menu')

<div class="container-xxl py-5" style="margin-top: 80px;">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-3">Blog</h1>
            <p>Čitajte najnovije priče, savjete i vijesti iz svijeta pčelarstva i organske proizvodnje.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{ asset('img/blog-1.jpg') }}" alt="Blog 1" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="javascript:void(0)">Kako uzgajati organsko voće i povrće kod kuće</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" src="{{ asset('img/blog-2.jpg') }}" alt="Blog 2" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="javascript:void(0)">Zdravlje pčela: najbolje prakse</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>02 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <img class="img-fluid" src="{{ asset('img/blog-3.jpg') }}" alt="Blog 3" loading="lazy">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="javascript:void(0)">Zašto birati organski med</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>03 Jan, 2045</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
</html>
