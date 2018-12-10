@extends('layouts.app')
@section('content')
<div class="p-md-3 m-md-3">
    <h1>Detalles del Movimiento {{$movement->id}}</h1>


<table class="table table-bordered">
    <tr>
        <th>Tipo</th>
        <td>{{$movement->type}}</td>
    </tr>
    <tr>
        <th>Fecha</th>
        <td>{{$movement->movement_date->format('d-m-Y')}}</td>
    </tr>
    <tr>
        <th>Categoria</th>
        <td>{{$movement->category->name}}</td>
    </tr>
    <tr>
        <th>BsS.</th>
        <td>{{number_format($movement->money_decimal,2)}}</td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td>{{$movement->description}}</td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td>{{$movement->user->name}}</td>
    </tr>
</table>

@if($movement->image)
    <a href="{{asset($movment->image)}}" class="thumbnail" target="_blank">
        <img src="{{asset($movment->image)}} " alt="image">
    </a>
@endif
</div>
@endsection
