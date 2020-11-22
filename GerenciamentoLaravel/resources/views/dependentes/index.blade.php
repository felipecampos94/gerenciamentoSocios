@extends('layouts.default')

@section('content')
    <h1>Dependentes</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Sócio</th>
        <th>Data de Nascimento</th>
        <th>Telefone</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($dependentes as $dependente)
            <tr>
                <td>{{$dependente->nome}}</td>
                <td>{{$dependente->endereco}}</td>
                <td>{{$dependente->cidade->nome}}</td>
                <td>{{$dependente->socio->nome}}</td>
                <td>{{ \Carbon\Carbon::parse($dependente->dataNascimento)->format('d/m/Y')}}</td>
                <td>{{$dependente->telefone}}</td>
                <td>
                    <a href="{{ route('dependentes.edit', ['id'=>$dependente->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$dependente->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $dependentes->links() }}

    <a href="{{ route('dependentes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "dependentes"
@endsection
