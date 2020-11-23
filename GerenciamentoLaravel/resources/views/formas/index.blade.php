@extends('layouts.default')

@section('content')
    <h1>Formas de Pagamento</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>QTD Máxima Parcela</th>
        <th>Intervalo Parcelas</th>
        <th>Primeira Parcela</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($formas as $forma)
            <tr>
                <td>{{$forma->nome}}</td>
                <td>{{$forma->qtdMaxParcela}}</td>
                <td>{{$forma->intervaloParcela}}</td>
                <td>{{$forma->primeiraParcela}}</td>
                <td>
                    <a href="{{ route('formas.edit', ['id'=>$forma->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$forma->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $formas->links() }}

    <a href="{{ route('formas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "formas"
@endsection
