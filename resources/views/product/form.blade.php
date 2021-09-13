@extends('layout')
@section('title',$product->id ? 'Editar Producto' : 'Nuevo Producto')
@section('titleH1',$product->id ? 'Editar Producto' : 'Nuevo Producto')

@section('content')
<form action="{{ route('product.save') }}" method="post">
    @csrf
    <input type="hidden" name='id' value="{{ $product->id }}">
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{ @old('name') ? @old('name') : $product->name}}">
        </div>
        @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="cost" class="col-sm-2 col-form-label">Cost</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="cost" name='cost' value="{{ @old('cost') ? @old('cost') : $product->cost}}">
        </div>
        @error('cost')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name='price' value="{{ @old('price') ? @old('price') : $product->price}}">
        </div>
        @error('price')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="quantity" name='quantity' value="{{ @old('quantity') ? @old('quantity') : $product->quantity}}">
        </div>
        @error('quantity')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-10">
            <select name="brand" class="form-select">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? "selected" : "" }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('brand')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="/products" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection