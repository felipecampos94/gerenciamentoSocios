@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header" style="background: lightgray">
            <h3>Editar Sócio</h3>
        </div>

        <div class="card-body">
            {!! Form::open(['route'=>["socios.update", 'id'=>$socio->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $socio->nome, ['class'=>'form-control', 'require']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('dataNascimento', 'Data Nascimento:') !!}
                {!! Form::date('dataNascimento', $socio->dataNascimento, ['class'=>'form-control','required']) !!}
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
                {!! Form::label('telefone', 'Telefone:') !!}
                {!! Form::text('telefone', $socio->telefone, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', $socio->email, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::number('valor', $socio->valor, ['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('ativo', 'Ativo:') !!}
                {!! Form::checkbox('ativo', $socio->ativo, true, ['class'=>'form-control','required']) !!}
            </div>


            <hr/>

            <h4>Dependentes</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float: right" class="add_field_button btn btn-default">Adicionar Dependente</button>

            <br>
            <hr/>

            <div class="form-group">
                {!! Form::submit('Editar Dependente', ['class'=>'btn btn-primary']) !!}
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
