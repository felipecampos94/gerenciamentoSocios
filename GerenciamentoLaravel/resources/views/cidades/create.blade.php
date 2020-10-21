@extends('adminlte::page')

@section('content')
    <h3>Nova Cidade</h3>

    {!! Form::open(['url'=>'cidades/store']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('siglaEstado', 'Sigla Estado:') !!}
        {!! Form::text('siglaEstado', null, ['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cep', 'Cep:') !!}
        {!! Form::text('cep', null, ['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Criar Cidade', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
