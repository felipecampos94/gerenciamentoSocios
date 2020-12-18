@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header" style="background: lightgray">
            <h3>Novo Pagamento</h3>
        </div>

        <div class="card-body">
            {!! Form::open(['route'=>'pagamentos.store']) !!}

            <div class="form-group">
                {!! Form::label('socio_id', 'Sócio:') !!}
                {!! Form::select('socio_id',
                                \App\Socio::orderBy('nome')->pluck('nome', 'id')->toArray(),
                                null, ['class'=>'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('dataPagamento', 'Data Pagamento:') !!}
                {!! Form::date('dataPagamento', \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo')), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('anoReferencia', 'Ano Referência:') !!}
                {!! Form::text('anoReferencia', null, ['class'=>'form-control', 'require']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('valorTotal', 'Valor Total:') !!}
                {!! Form::number('valorTotal',null, ['class'=>'form-control','required']) !!}
            </div>

            <hr/>

            <h4>Formas de Pagamento</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float: right" class="add_field_button btn btn-default">Adicionar Forma de Pagamento</button>

            <br>
            <hr/>

            <div class="form-group">
                {!! Form::submit('Criar Pagamento', ['class'=>'btn btn-primary']) !!}
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
                var newField = '<div><div style="width:94%; float:left" id="forma">{!! Form::select("formas[]", \App\Forma::orderBy("nome")->pluck("nome","id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione uma forma de pagamento"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
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
