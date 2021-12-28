@extends('layouts.master')
@section('title', 'Order')
@section("content")

<div class="container">
	<div class="row" style="overflow-x: auto;">
		<table border="1">
			<!-- <caption>Таблица заказов</caption> -->
			<tr>
				<th>№</th>
				<th>Заказ</th>
				<th>Цена</th>
				<th>Кол.<br> шт.</th>
				<th>Адрес</th>
				<th>Телефон</th>
				<th>Заказчик</th>
				<th>Время заказа</th>
			</tr>
			@foreach ($product as $cartus)
			<tr>
				<td>
					<p class="">{{$cartus->id}}</p>
				</td>
				<td>
					<p>{{$cartus->productname}} </p>
				</td>
				<td>
					<p>&#8372 {{$cartus->price}} грн.</p>
				</td>
				<td>
					<p>{{$cartus->countprod}}</p>
				</td>
				<td>
					<p> {{$cartus->address}}</p>
				</td>
				<td>
					<p> {{$cartus->phone}}</p>
				</td>
				<td>
					<p>{{$cartus->username}} </p>
				</td>
				<td>
					<p> {{$cartus->created_at}}</p>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>


@endsection