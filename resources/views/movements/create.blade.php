@extends('layouts.app')

@section('content')
  <div>
      <div class="row">
          <div class="col col-md-6 col-md-offset-5">

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
          </div>
      </div>
    </div>

@endsection
