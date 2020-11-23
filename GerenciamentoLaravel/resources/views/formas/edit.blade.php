@extends('adminlte::page')

@section('content')
    <h3>Editando Forma: {{$forma->nome}}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["formas.update", 'id'=>$forma->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome',  $forma->nome, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('qtdMaxParcela', 'QTD Máxima de Parcelas:') !!}
        {!! Form::number('qtdMaxParcela', $forma->qtdMaxParcela, ['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('intervaloParcela', 'Intervalo Entre Parcelas:') !!}
        {!! Form::number('intervaloParcela', $forma->intervaloParcela, ['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('primeiraParcela', 'Primeira Parcela:') !!}
        {!! Form::number('primeiraParcela', $forma->primeiraParcela, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Forma de Pagamento', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
