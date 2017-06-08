@extends('admin')

@section('content')

    {!! Form::open(['url' => 'autores', 'files'=>true]) !!}

    <div class="text-center">
        <h5><i class="fa fa-pencil"></i> Registo de Autor:</h5>
        <hr class="mt-2 mb-2">
    </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::text('nome',null,['placeholder'=>'Introduza o nome do autor']) !!}
            </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::text('apelido',null,['placeholder'=>'Introduza o apelido da autor']) !!}
            </div>

            <div class="radio-inline col-md-1 col-md-offset-1">
                <input name="genero" type="radio"  value="Feminino" checked="checked">
                <label for="feminino">Feminino</label>

                <input name="genero" type="radio"  value="Masculino" checked="checked">
                <label for="masculino">Masculino</label>
            </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::date('dataNascimento',null) !!}
            </div>


            {{--<div class="md-form">--}}
                {{--{{ Form::select('dataNascimento', null, ['class'=>'form-control datepicker', 'placeholder'=>'Selecione a data']) }}--}}
            {{--</div>--}}

            <div class="file-field col-lg-5">
                <div class="btn btn-primary btn-sm">
                    <span>Escolha a foto</span>
                    <input type="file" name="foto">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Busque o ficheiro">
                </div>
            </div>

            <br>
            <br>

            <div class="md-form col-md-9 col-md-offset-1">
                {!! Form::submit('GRAVAR', ['class' => 'btn btn-primary btn-sm']) !!}
            </div>
    {!! Form::close() !!}

@stop