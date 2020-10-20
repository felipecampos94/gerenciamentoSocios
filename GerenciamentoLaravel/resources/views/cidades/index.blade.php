@extends('adminlte::page')

@section('content')
    <h1>Cidades</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Sigla Estado</th>
            <th>Cep</th>
        </thead>

        <tbody>
        @foreach($cidades as $cidade)
            <tr>
                <td>{{$cidade->nome}}</td>
                <td>{{$cidade->siglaEstado}}</td>
                <td>{{$cidade->cep}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
