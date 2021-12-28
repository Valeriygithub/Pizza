@extends('layouts.master')
@section('title', 'Page Title')
@section("content")
<img class="img-fluid" style="max-height: 200px; width: 100%;" src="{{asset('images/hbd.png')}}" alt="img">

<div style='display: flex; flex-wrap: wrap; justify-content: center; padding-top: 30px;'>
@foreach ($product as $prod)
<!--Section: Content-->
<section class="text-center">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img class="img-fluid" style="max-height: 200px;" src="{{ url($prod->imagePath)}}" alt="{{ $prod->imagePath }}">
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$prod->productname}}</h5>
          <span>380 г</span>
          <p class="card-description">{{$prod->description}}</p>
          <?php
          if ($prod->new_price != null) { ?>
            <div class="box-price">
              <span class="card-text" style="text-decoration: line-through; padding-right: 23px;">&#8372 {{$prod->price}}</span>
              <span class='new_price'> &#8372 {{$prod->new_price}}</span>
            </div>
          <?php } else if ($prod->new_price == null) { ?>
            <h5 class="card-text" style="margin: 19px 0;">&#8372 {{$prod->price}}</h5>
          <?php } ?>
          <a href="{{ url('home/'. $prod->id)}}"><button class="btn btn-sm btn-outline-secondary">Подробнее</button></a>
          <a class="pay" href="{{route('home/add-cart', ['id' => $prod->id])}}"><button class="btn btn-sm btn-outline-secondary btn-pay">Купить</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
</div>
<div class="about-us" id="delivery">
  <hr style="margin: 50px 0">
  <h2 style="text-transform: uppercase;">ДОСТАВКА ПИЦЦ В ДНЕПРЕ</h2>
  <p>Все пицци с описанием ингредиентов, веса, указана актуальная цена и время доставки. У нас регулярно проходят акции, клиенты имеют шанс получать скидки, дарим подарки за крупные заказы или самовывоз блюд. Также у нас возможно заказать бесплатную доставку ланчей и обедов в офис. Выбрать и заказать обед в офис Вы можете из любого раздела меню. </p>
  <p>Вкусные и горячие пицци с экзотическими названиями, которые быстро доставят для Вас наши курьеры, порадуют любого. Наши постоянные клиенты уже оценили качество постапокалиптической еды и пива онлайн и скорость обслуживания. Дружный коллектив (повара, операторы, курьеры) стремится максимально удовлетворять потребности своих заказчиков: заказ принимается оператором в считанные мгновения четко и вежливо, повар сразу же приступает к приготовлению нужного блюда, а курьер доставляет заказанную еду, мчась на скорости света.</p>
  <p>Нет ничего приятнее, чем получать удовольствие, поглощая вкусную еду и приятные напитки в кругу родных, друзей и приятелей. Обращайтесь к нам, и Вы не пожалеете!</p>
</div>

@endsection