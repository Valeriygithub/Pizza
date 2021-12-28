@extends('layouts.master')

@section('title', 'Show Product')

@section('content')

<div class="container">
	<div class="card_grid_box">
		<div class="card_image">
			<img class="show_image" src="{{ url($product->imagePath)}}" alt="{{ $product->imagePath }}">
		</div>
		<div class="">
			<h2 class="card_title">{{$product->productname}}</h2>
			<p class="show_description">{{$product->description}}</p>
			<h3 style="text-decoration: line-through;">{{$product->price}} &#8372</h3>
			<?php
			if ($product->new_price != null) {
				echo	"<h3 class='new_price'> {$product->new_price} &#8372</h3>";
			} ?>
			<div class="">
				<button type="button" class="btn btn-sm btn-outline-secondary my_button_show">Купить</button>
			</div>
		</div>
	</div>
</div>

@endsection