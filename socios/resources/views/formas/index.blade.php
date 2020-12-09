@extends('layouts.default')

@section('content')
    <h1>Formas de Pagamento</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'formas']) !!}
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
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($formas as $forma)
            <tr>
                <td>{{$forma->nome}}</td>
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
