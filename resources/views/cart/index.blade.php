@extends('layouts.master')
@section('title', 'CART')
@section("content")

<div class="container cart-media-container">
	@foreach ($cart as $cartus)
	<section class="text-center">
		<div class="row">
			<div class="col-lg-6 mb-4">
				<div class="card" style="height: 580px;">
					<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
						<img class="img-fluid" style="max-height: 200px;" src="{{ url($cartus->attributes->image)}}" alt="img">
					</div>
					<div class="card-body">
						<h5 class="card-title">{{$cartus->name}}</h5>
						<span>380 г</span>
						<p class="card-description">{{$cartus->attributes->description}}</p>
						<h4 class="card_title" style="margin: 0;">&#8372 {{$cartus->price}}</h4>
						<div class="box-quantity-cart">
							<h5 class="card_title number-cart" style="margin: 0;">Количество: <span class="sum-item">{{$cartus->quantity}}</span> </h5>
							<a style="margin: 0 10px;" class="minus-cart" href="{{route('cart/update-minus', ['id' => $cartus->id])}}"><button value="{{$cartus->quantity}}" type="submit" class="btn btn-sm btn-outline-secondary ">-</button></a>
							<a class="pay" href="{{route('home/add-cart', ['id' => $cartus->id])}}"><button class="btn btn-sm btn-outline-secondary">+</button></a>
						</div>
						<a href="{{route('cart/remove-cart', ['id' => $cartus->id])}}"> <button style="border-radius: 35px; font-size:16px; background:#222;" type="submit" class="btn btn-sm btn-outline-secondary my_btn_edit">Удалить</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endforeach


	<div class="cart-box-order">
		@if(count($cart) < 1) <div class="box_cart_clear">
			<img class="img-fluid" src="{{ url('images/Cart_clear.svg')}}" alt="Img" width="100px">
			<h2>Корзина пуста</h2>
	</div>
	@else
	<div>
		<h4>Общая сумма: <span style="color: red;" class="all-sum">{{$sum}} грн.</span> </h4>
	</div>
	<div>
		<a href="{{route('order')}}"><button class="btn btn-sm btn-outline-secondary">Заказать</button></a>
	</div>
	@endif
</div>
</div>
@endsection