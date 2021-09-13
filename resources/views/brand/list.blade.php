@extends('layout')
@section('title','Lista Marcas')
@section('titleH1', 'Listado de Marcas')
@section('content')
<a href="{{ route('brand.form') }}" class="btn btn-primary">Nuevo Marca</a>
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
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="{{ route('brand.form',['id'=>$brand->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('brand.delete',['id'=>$brand->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection