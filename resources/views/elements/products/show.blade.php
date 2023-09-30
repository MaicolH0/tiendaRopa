@extends('layouts.app')
@section('title', 'tiendaRopa - Ver Pelicula')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        @auth
            <h1> <i class="fa fa-search"></i> Ver Producto</h1>
        @else
            <h1> <i class="fa fa-film"></i> {{$product->name}}</h1>
        @endauth

        <hr>
        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">
                            <i class="fa fa-clipboard-list"></i>  
                            Escritorio
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('products.index') }}">
                            <i class="fas fa-list-alt"></i> 
                            Módulo Productos
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-search"></i> 
                        Ver Producto
                    </li>
                </ol>
            </nav>
        @endauth

        <form>
            <div class="form-group mb-3">
                <div class="text-center my-3">
                    <img src="{{ asset($product->image) }}" class="img-thumbnail" id="preview" width="400px">
                </div>

            </div>
            <div class="mb-3">
                <label for="name" class=""><b> Nombre </b></label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" disabled>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><b> Descripción </b></label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4" disabled>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="brand" class=""><b> Marca </b></label>
                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $product->brand }}" disabled>
            </div>
            <div class="mb-3">
                <label for="price" class=""><b> Precio </b></label>
                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" disabled>
            </div>
            <div class="mb-3">
                <label for="stock" class=""><b> Cantidad </b></label>
                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $product->stock }}" disabled>
            </div>
            <div class="mb-3">
                <label for="slide" class=""><b> Destacado </b></label>
                <input id="slide" type="text" class="form-control @error('slide') is-invalid @enderror" name="slide" value="{{ $product->slide }}" disabled>
            </div>
            <div class="mb-3">
                <label for="section" class=""><b> Sección </b></label>
                <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ $product->section }}" disabled>
            </div>

            <div class="mb-3">
                <label for="category_id" class=""><b> Categoría</b></label>
                <div class="">
                    <input id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ $product->category->name }}" disabled>
                </div>
            </div>

            @auth
                <div class="d-grid gap-2 mb-3">

                    <a href="{{route('products.index')}}" class="btn btn-primary btn-block text-uppercase">Volver <i class="fa fa-left"></i></a>

                </div> 
            @endauth


        </form>
    </div>
</div> 
@endsection