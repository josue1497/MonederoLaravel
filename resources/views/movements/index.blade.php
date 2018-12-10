@extends('layouts.app')

@section('content')
<div class="p-md-3 m-md-3">
        <h1>{{$title}}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Tipo</td>
                    <td>Categoria</td>
                    <td>Cantidad</td>
                    <td colspan="2"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($movements as $movement)
                    <tr>
                        <td>{{$movement->movement_date->format('d/m/Y')}}</td>
                        <td>{{$movement->type}}</td>
                        <td>{{$movement->category->name}}</td>
                        <td>{{number_format($movement->money_decimal,2)}}</td>
                        <td>
                            <a href="{{route('movements.show', $movement)}}"> Detalles</a>
                        </td>
                        <td>
                            <a href="{{route('movements.edit', $movement)}}"> Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            @if(Request::get('type'))
                {!!$movements->appends('type', Request::get('type'))->links()!!}
            @else
            {!!$movements->links()!!}
            @endif
        </div>
</div>


@endsection
