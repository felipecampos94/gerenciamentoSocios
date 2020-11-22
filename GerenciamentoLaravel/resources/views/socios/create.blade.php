@extends('adminlte::page')

@section('content')
    <h3>Novo Sócio</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'socios.store']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cidade_id', 'Cidade:') !!}
        {!! Form::select('cidade_id',
                        \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                        null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dataNascimento', 'Data Nascimento:') !!}
        {!! Form::date('dataNascimento', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ativo', 'Ativo:') !!}
        {!! Form::text('ativo', null, ['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Socio', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
