@extends('layouts.app')
@section('content')

<div class="p-md-3 m-md-3">
    <h1>Edicion del Movimiento {{$movement->id}}</h1>

    {!! Form::model($movement, ['route'=>['movements.update',$movement],
                                'files'=>'true',
                                'method'=>'PUT']) !!}

        @include('movements.partials.form')

    {!! Form::close() !!}

</div>

@endsection
