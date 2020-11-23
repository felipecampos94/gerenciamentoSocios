@extends('layouts.default')

@section('content')
    <h1>Parcelas</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Data de Pagamento</th>
        <th>Ano Referência</th>
        <th>Valor Total</th>
        <th>QTD Parcelas</th>
        <th>Data de Vencimento</th>
        <th>Valor Parcela</th>
        <th>Situação</th>
        <th>Sócio</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($parcelas as $parcela)
            <tr>
                <td>{{ \Carbon\Carbon::parse($parcela->dataPagamento)->format('d/m/Y')}}</td>
                <td>{{$parcela->anoReferencia}}</td>
                <td>{{$parcela->valorTotal}}</td>
                <td>{{$parcela->qtdParcela}}</td>
                <td>{{ \Carbon\Carbon::parse($parcela->dataVencimento)->format('d/m/Y')}}</td>
                <td>{{$parcela->valorParcela}}</td>
                <td>{{$parcela->situacao}}</td>
                <td>{{$parcela->socio->nome}}</td>

                <td>
                    <a href="{{ route('parcelas.edit', ['id'=>$parcela->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$parcela->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $parcelas->links() }}

    <a href="{{ route('parcelas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "parcelas"
@endsection
