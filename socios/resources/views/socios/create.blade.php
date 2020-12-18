@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header" style="background: lightgray">
            <h3>Novo Sócio</h3>
        </div>

        <div class="card-body">
            {!! Form::open(['route'=>'socios.store']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'require']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('dataNascimento', 'Data Nascimento:') !!}
                {!! Form::date('dataNascimento', null, ['class'=>'form-control','required']) !!}
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
                {!! Form::label('telefone', 'Telefone:') !!}
                {!! Form::text('telefone', null, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::number('valor', null, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('ativo', 'Ativo:') !!}
                {!! Form::checkbox('ativo', null, true, ['class'=>'form-control','required']) !!}
            </div>


            <hr/>

            <h4>Dependentes</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float: right" class="add_field_button btn btn-default">Adicionar Dependente</button>

            <br>
            <hr/>

            <div class="form-group">
                {!! Form::submit('Criar Sócio', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;
            $(add_button).click(function (e) {
                x++;
                var newField = '<div><div style="width:94%; float:left" id="dependente">{!! Form::select("dependentes[]", \App\Dependente::orderBy("nome")->pluck("nome","id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um dependente"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click", ".remove_field", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>

@stop
