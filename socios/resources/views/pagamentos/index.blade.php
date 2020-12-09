@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Pagamentos</h3>

        {!! Form::open(['name'=>'form_name', 'route'=>'pagamentos']) !!}
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
                <th>Data de Pagamento</th>
                <th>Ano Referência</th>
                <th>Valor Total</th>
                <th>Formas de Pagamento</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tbody>
            @foreach($pagamentos as $pagamento)
                <tr>
                    <td>{{$pagamento->socio->nome}}</td>
                    <td>{{ \Carbon\Carbon::parse($pagamento->dataPagamento)->format('d/m/Y')}}</td>
                    <td>{{$pagamento->anoReferencia}}</td>
                    <td>{{$pagamento->valorTotal}}</td>
                    <td>
                        @foreach($pagamento->formas as $f)
                            <li>{{$f->forma->nome}}</li>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('pagamentos.edit', ['id'=>$pagamento->id])}}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$pagamento->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $pagamentos->links() }}

        <a href="{{route('pagamentos.create', [])}}" class="btn btn-info">Adicionar</a>
    </div>
@stop

@section('table-delete')
    "pagamentos"
@endsection
