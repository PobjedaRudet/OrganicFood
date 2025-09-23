@include('partials.header')
@include('partials.menu')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Features</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Features</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon py-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="bg-white h-100 p-4 p-xl-5 rounded shadow-sm wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-success me-2">Obavijest</span>
                        <small class="text-muted">Objavljeno: {{ \Carbon\Carbon::now()->format('d.m.Y.') }}</small>
                    </div>
                    <h1 class="mb-3">Natural Process — Naš prirodni proces uzgoja</h1>
                    <p class="lead text-secondary">Uz veliki ponos objavljujemo da smo u potpunosti uskladili naše proizvodne procese sa principima prirodnog, održivog i organskog uzgoja. Ovaj pristup garantuje više nutrijenata, bolji okus i, što je najvažnije, sigurnost za vaše zdravlje i našu okolinu.</p>

                    <img class="img-fluid mb-4" src="img/icon-1.png" alt="Natural Process">

                    <h4 class="mb-2">Šta znači "Natural Process"?</h4>
                    <p>Natural Process podrazumijeva minimalnu intervenciju i maksimalno poštovanje prirode. Ne koristimo sintetička đubriva ni pesticide, a fokus stavljamo na zdravlje tla, prirodne metode zaštite biljaka i rotaciju usjeva. Time čuvamo biodiverzitet i osiguravamo dugoročni kvalitet proizvoda.</p>

                    <h4 class="mb-2">Koraci u našem procesu</h4>
                    <ul class="list-unstyled ps-3">
                        <li class="mb-2">• Pažljiv odabir sjemena iz provjerenih, certificiranih izvora.</li>
                        <li class="mb-2">• Prirodno obogaćivanje tla kompostom i zelenom gnojidbom.</li>
                        <li class="mb-2">• Održiva, kap-po-kap (drip) navodnjavanja kako bismo smanjili potrošnju vode.</li>
                        <li class="mb-2">• Biološka zaštita od štetočina (korisni insekti, biljne barijere), bez hemikalija.</li>
                        <li class="mb-2">• Berba u optimalnoj zrelosti i brza, higijenska obrada.</li>
                        <li class="mb-2">• Transparentno označavanje i sljedivost svake serije proizvoda.</li>
                    </ul>

                    <h4 class="mb-2">Zašto je to važno?</h4>
                    <p>Prirodni uzgoj smanjuje utjecaj na okolinu, čuva mikrobiološki život u tlu i donosi hranu boljeg kvaliteta—bez ostataka pesticida. Naši kupci dobijaju proizvode punijeg okusa i većeg nutritivnog sastava, s punim povjerenjem u porijeklo i način proizvodnje.</p>

                    <div class="alert alert-success mt-4" role="alert">
                        <strong>Napomena:</strong> U narednim sedmicama uvodimo i sezonske ture kroz naše nasade kako biste se lično uvjerili kako izgleda Natural Process u praksi. Pratite naše objave za termine i prijave.
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

@include('partials.footer')
