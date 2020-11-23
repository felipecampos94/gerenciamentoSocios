@extends('adminlte::page')

@section('content')
    <h3>Editando Parcela: {{$parcela->nome}}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["parcelas.update", 'id'=>$parcela->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('dataPagamento', 'Data Pagamento:') !!}
        {!! Form::date('dataPagamento', $parcela->dataPagamento, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('anoReferencia', 'Ano de Referência:') !!}
        {!! Form::number('anoReferencia', $parcela->anoReferencia, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorTotal', 'Valor Total:') !!}
        {!! Form::number('valorTotal', $parcela->valorTotal, ['class'=>'form-control','required']) !!}
    </div>

{{--    <div class="form-group">--}}
{{--        {!! Form::label('formaPagamento_id', 'Forma de Pagamento:') !!}--}}
{{--        {!! Form::select('formaPagamento_id',--}}
{{--                        \App\FormaPagamento::orderBy('nome')->pluck('nome', 'id')->toArray(),--}}
{{--                        $parcela->formaPagamento_id, ['class'=>'form-control', 'required']) !!}--}}
{{--    </div>--}}

    <div class="form-group">
        {!! Form::label('qtdParcela', 'QTD Parcela:') !!}
        {!! Form::number('qtdParcela', $parcela->qtdParcela, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('socio_id', 'Sócio:') !!}
        {!! Form::select('socio_id',
                        \App\Socio::orderBy('nome')->pluck('nome', 'id')->toArray(),
                        $parcela->socio_id, ['class'=>'form-control', 'required']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('dataVencimento', 'Data de Vencimento:') !!}
        {!! Form::date('dataVencimento', $parcela->dataVencimento, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorParcela', 'Valor da Parcela:') !!}
        {!! Form::number('valorParcela', $parcela->valorParcela, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('situacao', 'Situação:') !!}
        {!! Form::number('situacao', $parcela->situacao, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Socio', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
