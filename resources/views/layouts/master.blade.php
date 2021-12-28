<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.84.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ValErus-Pizza</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/style-media.css')}}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
	<!-- Custom styles for this template -->

	<link href="{{asset('blog.css')}}" rel="stylesheet">

</head>

<body>

	<div class="fixed-box-nav">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fourth navbar example">
				<div class="container-fluid">
					<a style="color: yellow" class="navbar-brand" href="http://pizzaorder.zzz.com.ua/public/home">ValErus-Pizza</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarsExample04">
						<ul class="navbar-nav me-auto md">
							<!-- <ul class="navbar-nav me-auto mb-2 mb-md-0"> -->
							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="http://pizzaorder.zzz.com.ua/public/home">Главная</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#delivery">О Нас</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('home/contact')}}">Контакты</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="http://127.0.0.1:8000/admin">Админ</a>
							</li> -->
							<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
							<ul class="dropdown-menu" aria-labelledby="dropdown04">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li> -->
						</ul>
						<!-- Корзина ---------------------------------------------------------------------->
						<img class="nav-image-phone" src="{{asset('images/phone.svg')}}" alt="img" width="30px">
						<div style="display: flex; flex-direction: column;">
							<a class="nav-phone" href="tel:+38 (067) 373 43 74">+38 (067) 373 43 74</a>
							<a class="nav-phone" href="tel:+38 (093) 373 43 74">+38 (093) 373 43 74</a>
						</div>
						<a href="{{route('CartIndex')}}">
							<img class="link-cart" style="position: relative;" src="{{asset('images/Cart.svg')}}" alt="img" width="40px">
							<span class="cart_span link-cart-span">{{\Cart::session(\Illuminate\Support\Facades\Session::getId())->getTotalQuantity()}}</span>
							<!-- Корзина ---------------------------------------------------------------------->
						</a>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<div class="container" style="margin-bottom: 103px;">
		<!-- <main style='display: flex; flex-wrap: wrap; justify-content: center; padding-top: 100px;'> -->
		<main style='padding-top: 100px;'>
			@yield('content')
		</main>
	</div>


	<footer class="text-center text-lg-start bg-light text-muted my-footer">
		<!-- Section: Links  -->
		<section class="">
			<div class="container text-center text-md-start mt-5">
				<!-- Grid row -->
				<div class="row mt-3">
					<!-- Grid column -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<!-- Content -->
						<h6 class="fw-bold mb-4 navbar-brand" style="color: yellow">
							<i class="fas fa-gem me-3"></i>ValErus-Pizza
						</h6>
						<p>

							В процессе приготовления пиццы важно не просто выложить на тесто все продукты, которые имеются, а важно также соблюсти технологию приготовления пиццы. Пицца получается именно такой, какой она должна быть, благодаря не только качественным продуктам.
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4">
							Наши пицци
						</h6>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Карибская</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Четыре сыра</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Охотничья</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Карбонар</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Маргарита</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4">
							О Нас
						</h6>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Новости</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Блог</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Бонусная программа</a>
						</p>
						<p class="linc-footer">
							<a href="#!" class="nav-footer">Вакансии</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4">
							Контакты
						</h6>
						<p class="linc-footer"><i class="fas fa-home me-3"></i>Днепр, Карла-Маркса 58.</p>
						<p class="linc-footer">
							<i class="fas fa-envelope me-3"></i>
							info@example.com
						</p>
						<!-- <p class="linc-footer"><i class="fas fa-phone me-3"></i> +380 (50) 755 55 55</p>
						<p class="linc-footer"><i class="fas fa-print me-3"></i> +380 (93) 755 55 55</p> -->
						<div style="display: flex; flex-direction: column;">
							<a class="nav-phone" href="tel:+38 (067) 373 43 74">+38 (067) 373 43 74</a>
							<a class="nav-phone" href="tel:+38 (093) 373 43 74">+38 (093) 373 43 74</a>
						</div>
					</div>
					<!-- Grid column -->
				</div>
				<!-- Grid row -->
			</div>
		</section>
		<!-- Section: Links  -->

		<!-- Copyright -->
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			© 2021 Copyright:
			<a class="text-reset fw-bold" href="https://mdbootstrap.com/">ValErus-Pizza</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>