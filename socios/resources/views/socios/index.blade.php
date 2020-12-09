@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Sócios</h3>

        {!! Form::open(['name'=>'form_name', 'route'=>'socios']) !!}
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

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Sócio</th>
                <th>Data de Nascimento</th>
                <th>Cidade</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Dependentes</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tbody>
            @foreach($socios as $socio)
                <tr>
                    <td>{{$socio->nome}}</td>
                    <td>{{ \Carbon\Carbon::parse($socio->dataNascimento)->format('d/m/Y')}}</td>
                    <td>{{$socio->cidade->nome}}</td>
                    <td>{{$socio->telefone}}</td>
                    <td>{{$socio->email}}</td>
                    <td>
                        @foreach($socio->dependentes as $d)
                            <li>{{$d->dependente->nome}}</li>
                        @endforeach
                    </td>

                    <td>
                        <a href="{{route('socios.edit', ['id'=>$socio->id])}}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$socio->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $socios->links() }}

        <a href="{{route('socios.create', [])}}" class="btn btn-info">Adicionar</a>
    </div>
@stop

@section('table-delete')
    "socios"
@endsection
