@extends('layouts.app')

@section('content')
    <h1>Movimiento Nuevo</h1>


    {!! Form::model(
        $movement = new \App\Movement(['money'=>0.00]),
        [
            'route'=>'movements.store',
            'files' =>'true'
        ])
        !!}

            @include('movements.partials.form')

    {!! Form::close() !!}

@endsection
