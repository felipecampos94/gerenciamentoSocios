@extends('layouts.default')

@section('content')
    <h1>CTG</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'ctgs']) !!}
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
        <th>CNPJ</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($ctgs as $ctg)
            <tr>
                <td>{{$ctg->nome}}</td>
                <td>{{$ctg->cnpj}}</td>
                <td>{{$ctg->endereco}}</td>
                <td>{{$ctg->telefone}}</td>
                <td>{{$ctg->email}}</td>
                <td>{{$ctg->cidade->nome}}</td>

                <td>
                    <a href="{{ route('ctgs.edit', ['id'=>$ctg->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$ctg->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $ctgs->links() }}

    <a href="{{ route('ctgs.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "ctgs"
@endsection
