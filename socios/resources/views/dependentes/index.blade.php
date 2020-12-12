@extends('layouts.default')

@section('content')
    <h1>Dependentes</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'dependentes']) !!}
    <div calss="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
                	<button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
              	</span>
        </div>
    </div>
    {!! Form::close() !!}
    <br>

    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Data de Nascimento</th>
        <th>Telefone</th>
        <th>Cidade</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($dependentes as $dependente)
            <tr>
                <td>{{$dependente->nome}}</td>
                <td>{{$dependente->endereco}}</td>
                <td>{{ \Carbon\Carbon::parse($dependente->dataNascimento)->format('d/m/Y')}}</td>
                <td>{{$dependente->telefone}}</td>
                <td>{{$dependente->cidade->nome}}</td>
                <td>
                    <a href="{{ route('dependentes.edit', ['id'=>\Crypt::encrypt($dependente->id)]) }}" class="btn-sm btn-success">Editar</a>
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
