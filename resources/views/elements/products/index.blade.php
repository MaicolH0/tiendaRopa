@extends('layouts.app')
@section('title', 'tiendaRopa - Lista de productos')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1 style="color: #9B2B2B;"> <i class="fa fa-film"></i> Lista de Produtos</h1>
        <hr>
        @if (Auth::user()->role->name == 'Admin' or Auth::user()->role->name == 'Seller')
            <a href="{{route('products.create')}}" class="btn btn-primary my-3"> 
                <i class="fa fa-plus pr-2"></i>
                Agregar Producto
            </a>
        @endif

        <br>
        @if (count($products)>0)
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Acciones</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td><img src="{{ asset($product->image) }}" width="36px"></td>
                        <td>{{$product->created_at}}</td>

                        <td>
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-search"></i></a>
                            @if (Auth::user()->role->name == 'Admin' or Auth::user()->role->name == 'Seller')
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-pen"></i></a>
                                <form action="{{route('products.destroy',$product)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
            </table>
        @else
            <div class="alert alert-warning my-4" role="alert">
                Aún no hay Productos registradas
            </div> 
        @endif
    </div>
</div>
@endsection