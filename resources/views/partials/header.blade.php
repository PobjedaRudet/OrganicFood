
<!-- Meta & Basic Head Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no">

<!-- Favicon -->
<link href="{{ asset('img/favicon.ico') }}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Mobile Menu Tweaks -->
<style>
	/* Veći tap-area i čitljivost na telefonima */
	@media (max-width: 575.98px) {
		.navbar-brand h1 { font-size: 1.55rem; line-height: 1.15; }
		.navbar .navbar-nav .nav-link {
			font-size: 1.12rem;
			padding: 14px 0 !important; /* povećaj visinu za lakši dodir */
		}
		.navbar-toggler {
			padding: .65rem .8rem;
			font-size: 1.25rem;
			border: 2px solid rgba(0,0,0,.15);
		}
		.navbar-toggler:focus { box-shadow: 0 0 0 .15rem rgba(60,184,21,.35); }
		/* Povećaj ikonu burgera (dodamo custom background ako default mala) */
		.navbar-light .navbar-toggler-icon {
			width: 1.55em; height: 1.55em;
			background-size: 100% 100%;
		}
		/* Osiguraj da collapsed container ima malo više zraka */
		#navbarCollapse { padding: .35rem 0 .75rem; }
	}

	/* Blagi boost za small tablete */
	@media (min-width: 576px) and (max-width: 767.98px) {
		.navbar .navbar-nav .nav-link { font-size: 1.05rem; }
	}
</style>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- Helper: Add class on body when JS ready (može pomoći ako želimo progresivno poboljšanje) -->
<script>
document.addEventListener('DOMContentLoaded', function(){
	document.documentElement.classList.add('js-ready');
});
</script>
