@extends('layouts.app')
@section('content')

    <h1>Detalles del Movimiento {{$movement->id}}</h1>


<table class="table table-bordered">
    <tr>
        <th>Tipo</th>
        <td>{{$movement->type}}</td>
    </tr>
    <tr>
        <td>Fecha</td>
        <td>{{$movement->movement_date->format('d-m-Y')}}</td>
    </tr>
    <tr>
        <td>Categoria</td>
        <td>{{Category::find($movement->category_id)->name}}</td>
    </tr>
    <tr>
        <td>BsS.</td>
        <td>{{number_format($movement->money_decimal,2)}}</td>
    </tr>
    <tr>
        <th>Descripción</th>
        <th>{{$movement->descripcion}}</th>
    </tr>
</table>

@if($movement->image)
    <a href="{{asset($movment->image)}}" class="thumbnail" target="_blank">
        <img src="{{asset($movment->image)}} " alt="image">
    </a>
@endif
@endsection
