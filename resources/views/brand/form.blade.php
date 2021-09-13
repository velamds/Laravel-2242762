@extends('layout')
@section('title',$brand->id ? 'Editar Marca' : 'Nuevo Marca')
@section('titleH1',$brand->id ? 'Editar Marca' : 'Nuevo Marca')

@section('content')
<form action="{{ route('brand.save') }}" method="post">
    @csrf
    <input type="hidden" name='id' value="{{ $brand->id }}">
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{ @old('name') ? @old('name') : $brand->name}}">
        </div>
        @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="/brands" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection