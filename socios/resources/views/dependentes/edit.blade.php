@extends('adminlte::page')

@section('content')
    <h3>Editando Dependente: {{$dependente->nome}}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["dependentes.update", 'id'=>$dependente->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $dependente->nome, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', $dependente->endereco, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dataNascimento', 'Data Nascimento:') !!}
        {!! Form::date('dataNascimento', $dependente->dataNascimento, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', $dependente->telefone, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cidade_id', 'Cidade:') !!}
        {!! Form::select('cidade_id',
                        \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                        $dependente->cidade_id, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Socio', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
