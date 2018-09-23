@extends('layout.app')
@section('title','ALMACENANDO DATOS EN CACHE')
@section('content')
<h2>Lista de Bancos en cache</h2>
<div class="jumbotron">
    <div class="list-group">
    @forelse($datos as $row)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{$row->bankName}}</h4>
            <p class="list-group-item-text">{{$row->bankCode}}</p>
        </a>
    @empty
    <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">No se encontraron registros</h4>
            <p class="list-group-item-text">...</p>
        </a>
    @endforelse
    </div>
</div>
@endsection