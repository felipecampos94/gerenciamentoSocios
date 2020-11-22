@extends('layouts.default')

@section('content')
    <h1>Sócios</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Data de Nascimento</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Valor</th>
        <th>Ativo</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($socios as $socio)
            <tr>
                <td>{{$socio->nome}}</td>
                <td>{{$socio->endereco}}</td>
                <td>{{$socio->cidade->nome}}</td>
                <td>{{ \Carbon\Carbon::parse($socio->dataNascimento)->format('d/m/Y')}}</td>
                <td>{{$socio->email}}</td>
                <td>{{$socio->telefone}}</td>
                <td>{{$socio->valor}}</td>
                <td>{{$socio->ativo}}</td>
                <td>
                    <a href="{{ route('socios.edit', ['id'=>$socio->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$socio->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $socios->links() }}

    <a href="{{ route('socios.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "socios"
@endsection
