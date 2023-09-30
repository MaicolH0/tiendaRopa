@extends('layouts.app')
@section('title', 'tiendaRopa - Editar Peliculas')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-pen"></i> Editar Producto</h1>
        <hr>
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
                    <i class="fa fa-pen"></i> 
                    Editar Producto
                </li>
            </ol>
        </nav>
        <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="">Nombre </label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="brand" class="">Marca</label>

                <div class="">
                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus>

                    @error('brand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="">Precio</label>

                <div class="">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="stock" class="">Cantidad</label>

                <div class="">
                    <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="slide" class="">Destacado</label>

                <div class="">
                    <input id="slide" type="text" class="form-control @error('slide') is-invalid @enderror" name="slide" value="{{ old('slide') }}" required autocomplete="slide" autofocus>

                    @error('slide')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="section" class="">Sección</label>
                <select class="form-select" aria-label="Seleccione un rol..." name="section" required>
                    <option selected>Seleccione...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <div class="text-center my-3">
                    <img src="{{ asset('images/no-image.jpg') }}" class="img-thumbnail" id="preview" width="120px">
                </div>
                <label for="image" class="form-label">Portada</label>
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <div class="mb-3">
                <label for="category_id" class="">Categoría</label>
                <select class="form-select" aria-label="Seleccione un categoria..." name="category_id" required>
                    <option selected>Seleccione...</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block text-uppercase"> Editar <i class="fa fa-save mx-2"></i></button>
            </div>

        </form>
    </div>
</div> 
@endsection