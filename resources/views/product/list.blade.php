@extends('layout')
@section('title','Lista Productos')
@section('titleH1', 'Listado de Productos')
@section('content')
<a href="{{ route('product.form') }}" class="btn btn-primary">Nuevo Producto</a>
@if(Session::has('message'))
    <p class="text-danger">{{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
    <p class="text-success">{{ Session::get('successMessage') }}</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cost }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>
                    <a href="{{ route('product.form',['id'=>$product->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('product.delete',['id'=>$product->id])}}" class="btn btn-danger">Borrar</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                        modal
                    </button>
                </td>

                
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection