@extends('layouts.master')
@section('title', 'Page Title')
@section("content")


<!-- -------------------------------------------------   Добавить Пользователя ---------------------- -->

<div class="row creat_box">
	<div style="text-align: center; ">
		@if(session('message') )
		<h2 style="background: red;">{{session('message')}}</h2>
		@endif
	</div>
	<h2 style="text-align: center;">Создать Пользователя</h2>
	{!! Form::model($admin, array(
	'action' => '\App\Http\Controllers\CominController@store',
	"files" => true, 'class' => 'form'
	)) !!}

	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', '', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		<!-- {!! Form::text('password', '', ['class' => 'form-control']) !!} -->
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
		Добавить Пользователя
	</button>
	{!! Form::close() !!}
</div>

@endsection