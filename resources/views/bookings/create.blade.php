@extends('layout')

@section('content')
    <h1>Reservar Quarto</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-primary mb-3">Ver todos os quartos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['action' => ['BookingsController@store']]) !!}
                <div class="form-group row">
                    {!! Form::label('customer_id', 'Cliente', ['class' => 'col-sm-2 form-control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('customer_id', $customers, null, ['class' => 'form-control c-select']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="checkin" class="col-sm-2 form-control-label">Entrada</label>
                    <div class="col-sm-5">
                        {!! Form::text('checkin', \Carbon\Carbon::now()->format("d/m/Y"), ['class' => 'form-control js-date']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="checkout" class="col-sm-2 form-control-label">Saída</label>
                    <div class="col-sm-5">
                        {!! Form::text('checkout', \Carbon\Carbon::now()->addDay()->format("d/m/Y"), ['class' => 'form-control js-date']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('room_id', 'Quarto', ['class' => 'col-sm-2 form-control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('room_id', $rooms, $room->id ?? request('roomId'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('price', 'Valor', ['class' => 'col-sm-2 form-control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Reservar</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
