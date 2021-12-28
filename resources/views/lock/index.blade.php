@extends('layouts.master')
@section('title', 'Page Title')
@section("content")



<!-- -------------------------------------------------   Вход в админку  ---------------------- -->
<div class="row creat_box" style="max-width: 400px;">
		@if(session('password') )
		<h2 style="text-align: center; background:chartreuse;">Пароль или логин введены не верно</h2>
		@endif

	<h2 style="text-align: center;">Войти</h2>
	{!! Form::model($admin, array(
	'action' => '\App\Http\Controllers\LoockController@store',
	"files" => true, 'class' => 'form form-come'
	)) !!}

	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', '', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		<input class="form-control" type="password" name="password">
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
		Войти
	</button>
	{!! Form::close() !!}
</div>
@endsection