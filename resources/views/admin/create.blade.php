@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

	<!-- ---------------------- session -------------------------- -->
	<div class="">
		@if(session('message'))
		<div class="alert alert–success">
			{{session('message')}}
		</div>
		@endif
		<!-- ---------------------- session -------------------------- -->

<div class="row creat_box">
    <h2 style="text-align: center;">Добавить новый продукт</h2>
    {!! Form::model($product, array(
    'action' => '\App\Http\Controllers\AdminController@store',
    "files" => true, 'class' => 'form'
    )) !!}

    <div class="form-group">
        {!! Form::label('productname', 'Название продукта') !!}
        {!! Form::text('productname', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Цена') !!}
        {!! Form::text('price', '', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			 {!! Form::label('new_price', 'Новая цена') !!}
			 {!! Form::text('new_price', '', ['class' => 'form-control']) !!}
		</div>
    <div class="form-group">
        {!! Form::label('description', 'Описание') !!}
        {!! Form::text('description', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('imagesPath', 'Загрузить картинку продукта') !!}
        {!! Form::file('imagesPath', ['class' => 'col-md-10', 'required' => 'true']) !!}
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button class="btn btn-success edit_btn" type="submit">
        Добавить продукт
    </button>
    {!! Form::close() !!}
</div>
@endsection