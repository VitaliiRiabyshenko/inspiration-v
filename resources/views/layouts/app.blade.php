<!DOCTYPE html>
<html lang="@yield('lang')">
<head>
	@yield('head_seo')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">	
</head>
<body>

	@include('includes.header')

	<main>
		@yield('content')
	</main>

	@include('includes.footer')

	<div class="top-scroll" id="topscroll"></div>
	
	@yield('toast')

	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	
	<script>
		/* прокрутка страницы наверх */
		$(function () {
			var o = null;
			$(window).scroll(function () {
				o !== 0 < $(this).scrollTop() && ((o = 600 < $(this).scrollTop()) ? $("#topscroll").fadeIn(300) : $("#topscroll").fadeOut(300, "linear"))
			}), $("#topscroll").click(function () {
				$("body,html").animate({
					scrollTop: 0
				}, 800)
			})
		});
	</script>

	@yield('script')
</body>
</html>