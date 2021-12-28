@extends('layouts.master')
@section('title', 'Page Title')
@section("content")

<div class="box-admin">
	@if(session('name') && session('password') )
	<div class="admin-panel-btn">
		<a style="color: #fff; text-decoration: none;" href="http://pizzaorder.zzz.com.ua/public/adminca">
			<button class="btn btn-success edit_btn ">Выход из панели админа</button>
		</a>
		<a class="my_link_btn" href="{{"cartProduct"}}"><button type="button" class="btn btn-success edit_btn">Заказы</button></a>
		<a class="my_link_btn" href="http://pizzaorder.zzz.com.ua/public/admin/create"><button type="button" class="btn btn-success edit_btn">Добавить Новый Продукт</button></a>
	</div>

	@foreach ($product as $prod)
	<div class="container">
		<div class="card_grid_box admin_card_index">
			<div class="card_image admin-image">
				<img class="admin_product_image" src="{{ url($prod->imagePath)}}" alt="{{ $prod->imagePath }}">
			</div>
			<div class="admin-product">
				<h2 class="card_title">{{$prod->productname}}</h2>
				<p class="show_description">{{$prod->description}}</p>
				<div class="box-admin-price">
					<h3 style="text-decoration: line-through;">{{$prod->price}} &#8372</h3>
					<?php
					if ($prod->new_price != null) {
						echo	"<h3 class='new_price'> {$prod->new_price} &#8372</h3>";
					} ?>
				</div>
				<div>
					<div class="btn-group">
						<a class="my_link_btn" href="{{ url('admin/' . $prod->id . "/edit") }}"><button type="button" class="btn btn-sm btn-outline-secondary admin_btn">Править Продукт</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

	@else
	<a style="color: #fff; text-decoration: none;" href="http://pizzaorder.zzz.com.ua/public/adminca">
		<button class="btn btn-success edit_btn admin-btn">Aвторизация</button>
	</a>
	<div style="margin-bottom: 266px;"></div>
	@endif
</div>
<!-- -------------------------------------------------------------------------------------------------------------- -->

<?php
$login = ($_GET['login']) ?? null;
$password = ($_GET['password']) ?? null;
?>

<?php
if ($login === 'admin' && $password === 'admin') { ?>
	<!-- ---------------------- Card -------------------------- -->
	@foreach ($product as $prod)

	<div class="container">
		<div class="card_grid_box admin_card_index">
			<div class="card_image admin-image">
				<img class="admin_product_image" src="{{ url($prod->imagePath)}}" alt="{{ $prod->imagePath }}">
			</div>
			<div class="">
				<h2 class="card_title">{{$prod->productname}}</h2>
				<h5 class="show_description ">{{$prod->description}}</h5>
				<div>

					<h3 style="text-decoration: line-through;">{{$prod->price}} &#8372</h3>
					<?php
					if ($prod->new_price != null) {
						echo	"<h3 class='new_price'> {$prod->new_price} &#8372</h3>";
					} ?>
				</div>
				<div class="">
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-outline-secondary admin_btn"><a class="my_link_btn" href="http://pizzaorder.zzz.com.ua/admin/create">Добавить Новый Продукт</a></button>
						<button type="button" class="btn btn-sm btn-outline-secondary admin_btn"><a class="my_link_btn" href="{{ url('admin/' . $prod->id . "/edit") }}">Править Продукт</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
<?php } ?>
@endsection