@extends('layouts.master')
@section('title', 'CART')
@section("content")



<div class="container" style="max-width: 600px; justify-content: center;display: flex;">
@if(count($cart) < 1) <div class="box_cart_clear">
  <img class="img-fluid" src="{{ url('images/Cart_clear.svg')}}" alt="Img" width="100px">
  <h4>Спасибо за заказ</h4>
  <h4>Ожидайте вкусной пицци</h4>
  </div>
  @else

  <div class="row creat_box">
  <h2 style="text-align: center;">Заказ</h2>
  {!! Form::model($order, array(
  'action' => '\App\Http\Controllers\CartController@store',
  "files" => true, 'class' => 'form'
  )) !!}

  <!-- ------------- Добавляю в массив для передачи в поле nameproduct bd cart-product------------------------ -->
  @foreach($cart as $ca)
  <?php
  $valera[] = " ( " . $ca->name . ': ' . $ca->price  .' грн, '  . 'Количество: '. $ca->quantity . ' шт.' . " ) ";
  // var_dump($valera);
  ?>
  @endforeach
  <?php
  //! Преобразовую в строку для заполнения формы productname'
  $implode = implode(", ", $valera);
  ?>
  <!-- ------------------------------------- -->

  <div class="form-group">
    <!-- {!! Form::label('productname', 'Название продукта') !!} -->
    {!! Form::hidden('productname',  $implode, ['class' => 'form-control', 'placeholder' => 'джейсоном наверное чтоб все описание залетало']) !!}
  </div>
  <div class="form-group">
    <!-- {!! Form::label('price', 'Общая сумма') !!} -->
    {!! Form::hidden('price', $sum, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <!-- {!! Form::label('Telegram', 'Telegram') !!} -->
    {!! Form::hidden('telegram_user_id', '784250988', ['class' => 'form-control']) !!}
  </div>
  <div class="form-group  form-order">
    {!! Form::label('address', 'Ваше Имя') !!}
    {!! Form::text('username', '', ['class' => 'form-control order-input', 'placeholder' => 'Ваше Имя']) !!}
  </div>
  <div class="form-group  form-order">
    {!! Form::label('address', 'Адрес') !!}
    {!! Form::text('address', '', ['class' => 'form-control order-input', 'placeholder' => 'Укажите адрес доставки']) !!}
  </div>

  <div class="form-group  form-order">
    {!! Form::label('Phone', 'Ваш номер телефона') !!}
    {!! Form::text('phone', '', ['class' => 'form-control order-input', 'placeholder' => '093 000 00 00']) !!}
  </div>
  <div class="form-group  form-order">
    <!-- {!! Form::label('countprod', 'Количество пицц') !!} -->
    {!! Form::hidden('countprod', $allproduct, ['class' => 'form-control order-input']) !!}
  </div>
  <!-- ===================== -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h6 style="margin-top: 20px;">Количество пицц <span style="color: red;">{{$allproduct}}</span> шт.</h6>
  <h5 style="color: red; margin-top:20px;">Всего к оплате: {{$sum}} грн.</h5>

  <a href="{{route('clear')}}">
    <button style="width: 100%;" class="btn btn-success edit_btn order" type="submit">
      Заказать
    </button>
  </a>
  {!! Form::close() !!}
</div>

  @endif

  </div>
  @endsection