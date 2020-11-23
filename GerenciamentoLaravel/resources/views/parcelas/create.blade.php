@extends('adminlte::page')

@section('content')
    <h3>Nova Parcela</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'parcelas.store']) !!}

    <div class="form-group">
        {!! Form::label('dataPagamento', 'Data Pagamento:') !!}
        {!! Form::date('dataPagamento', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('anoReferencia', 'Ano de Referência:') !!}
        {!! Form::number('anoReferencia', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorTotal', 'Valor Total:') !!}
        {!! Form::number('valorTotal', null, ['class'=>'form-control','required']) !!}
    </div>

{{--    <div class="form-group">--}}
{{--        {!! Form::label('formaPagamento_id', 'Forma de Pagamento:') !!}--}}
{{--        {!! Form::select('formaPagamento_id',--}}
{{--                        \App\FormaPagamento::orderBy('nome')->pluck('nome', 'id')->toArray(),--}}
{{--                        null, ['class'=>'form-control', 'required']) !!}--}}
{{--    </div>--}}

    <div class="form-group">
        {!! Form::label('qtdParcela', 'QTD Parcela:') !!}
        {!! Form::number('qtdParcela', null, ['class'=>'form-control','required']) !!}
    </div>

<div class="form-group">
        {!! Form::label('socio_id', 'Sócio:') !!}
        {!! Form::select('socio_id',
                        \App\Socio::orderBy('nome')->pluck('nome', 'id')->toArray(),
                        null, ['class'=>'form-control', 'required']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('dataVencimento', 'Data de Vencimento:') !!}
        {!! Form::date('dataVencimento', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorParcela', 'Valor da Parcela:') !!}
        {!! Form::number('valorParcela', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('situacao', 'Situação:') !!}
        {!! Form::number('situacao', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Parcela', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
