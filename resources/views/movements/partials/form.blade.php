<div class="container">
<div class="form-group{{$errors -> has ('movement_date')? ' has-error':''}}">

    {!! Form::label('movement_date', 'Fecha') !!}

    {!! Form::date('movement_date', ($movement->movement_date)?
    $movement->movemente_date->format('Y-m-d'):
    date('Y-m-d'), ['required',
    'class'=>'form-control']) !!}
    @if($errors->has('movement_date'))
    <span class="help-block">
        <strong>{{$errors->first('movement_date')}}</strong>
    </span>
    @endif
</div>

<div class="form-group{{$errors -> has ('type')? ' has-errors':''}}">

        {!! Form::label('type', 'Fecha') !!}

        {!! Form::select('type',
            ['Egreso'=>'Egreso','Ingreso'=>'Ingreso'],
            null,
            ['required',
            'class'=>'form-control']) !!}

        @if($errors->has('type'))
        <span class="help-block">
            <strong>{{$errors->first('type')}}</strong>
        </span>
        @endif
    </div>

<div class="form-group{{$errors -> has ('movement_conroller')? ' has-errors':''}}">

        {!! Form::label('category_id', 'Categoria') !!}

        {!! Form::select('category_id',$categories,null, ['required',
        'class'=>'form-control']) !!}
        @if($errors->has('category_id'))
        <span class="help-block">
            <strong>{{$errors->first('category_id')}}</strong>
        </span>
        @endif
</div>

<div class="form-group{{$errors -> has ('description')? ' has-errors':''}}">

        {!! Form::label('description', 'Descripción') !!}

        {!! Form::textarea('description',null, ['required',
        'class'=>'form-control', 'placeholder'=>'Descripción',
        'autocomplete'=>'off',
        'maxlength'=>1000]) !!}
        @if($errors->has('description'))
        <span class="help-block">
            <strong>{{$errors->first('description')}}</strong>
        </span>
        @endif
</div>

<div class="form-group{{$errors -> has ('money_decimal')? ' has-errors':''}}">

        {!! Form::label('money_decimal', 'Monto') !!}

        {!! Form::number('money_decimal',null,
        ['required',
        'class'=>'form-control',
        'placeholder'=>'Monto',
        'autocomplete'=>'off',
        'maxlength'=>1000,
        'min'=>0.00,
        'step'=>0.01]) !!}
        @if($errors->has('money_decimal'))
        <span class="help-block">
            <strong>{{$errors->first('money_decimal')}}</strong>
        </span>
        @endif
</div>

<div class="form-group{{$errors -> has ('image')? ' has-errors':''}}">

        {!! Form::label('image', 'Monto') !!}

        {!! Form::file('image',null,
        ['class'=>'form-control',]) !!}
        @if($errors->has('image'))
        <span class="help-block">
            <strong>{{$errors->first('image')}}</strong>
        </span>
        @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</div>
