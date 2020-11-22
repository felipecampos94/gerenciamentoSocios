@extends('adminlte::page')

@section('content')
    <h3>Editando Sócio: {{$socio->nome}}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["socios.update", 'id'=>$socio->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $socio->nome, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', $socio->endereco, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cidade_id', 'Cidade:') !!}
        {!! Form::select('cidade_id',
                        \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                        $socio->cidade_id, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dataNascimento', 'Data Nascimento:') !!}
        {!! Form::date('dataNascimento', $socio->dataNascimento, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', $socio->email, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', $socio->telefone, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::number('valor', $socio->valor, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ativo', 'Ativo:') !!}
        {!! Form::checkbox('ativo', $socio->ativo, ['class'=>'form-control','required']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Editar Socio', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
