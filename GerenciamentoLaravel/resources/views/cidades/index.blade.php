@extends('adminlte::page')

@section('content')
    <h1>Cidades</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Sigla Estado</th>
        <th>Cep</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($cidades as $cidade)
            <tr>
                <td>{{$cidade->nome}}</td>
                <td>{{$cidade->siglaEstado}}</td>
                <td>{{$cidade->cep}}</td>
                <td>
                    <a href="{{ route('cidades.edit', ['id'=>$cidade->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="{{ route('cidades.destroy', ['id'=>$cidade->id]) }}" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('cidades.create', []) }}" class="btn btn-info">Adicionar</a>
@stop
