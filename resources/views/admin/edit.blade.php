@extends('layouts.master')

@section('title', 'Show Product')

@section('content')

<div class="my_container_edit">

    <form class="edit_form_box" action="{{ route('admin.update', ['admin' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            {!! Form::label('price', 'Price') !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('new_price', 'NEW_Price') !!}
            {!! Form::text('new_price', $product->new_price, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('productname', 'Productname') !!}
            {!! Form::text('productname', $product->productname, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'col-md-10']) !!}
        </div>

        <img class="img-block" src="{{ url($product->imagePath)}}" alt="{{ $product->imagePath }}">
        <div class="form-group">
            {!! Form::label('imagesPath', 'Add Image') !!}
            {!! Form::file('imagesPath', ['class' => 'col-md-10']) !!}
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

        <button class="btn btn-sm btn-outline-secondary edit_btn" type="submit">
            Применить изменения
        </button>
        {!! Form::close() !!}

        <!-- ---------------------DELETE ---------------------------- -->
        <form class="edit_form_box" action="{{ route('admin.destroy', ['admin' => $product->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-secondary my_btn_edit">Delete</button>
        </form>
        <!-- ---------------------DELETE ---------------------------- -->
    </form>
</div>
@endsection