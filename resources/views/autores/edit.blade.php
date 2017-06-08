@extends('admin')

@section('content')

    {!! Form::model($autor,['method' => 'PATCH','files'=>true,'route'=>['autores.update',$autor->id]]) !!}
            <div class="text-center">
                <h5><i class="fa fa-pencil"></i> Actualização de Autor:</h5>
                <hr class="mt-2 mb-2">
            </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::text('nome',null,['placeholder'=>'Introduza o nome do autor']) !!}
            </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::text('apelido',null,['placeholder'=>'Introduza o apelido da autor']) !!}
            </div>

            <div class="radio-inline col-md-1 col-md-offset-1">
                <input name="genero" type="radio" id="feminino" value="Feminino" checked="checked">
                <label for="feminino">Feminino</label>

                <input name="genero" type="radio" id="masculino" value="Masculino" checked="checked">
                <label for="masculino">Masculino</label>
            </div>

            <div class="md-form col-md-5 col-md-offset-1">
                {!! Form::date('dataNascimento',null) !!}
            </div>

            <div class="md-form col-md-3 col-md-offset-9">
                {!! Form::file('foto',null) !!}
            </div>
            <div class="md-form col-md-9 col-md-offset-1">
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary btn-sm']) !!}
            </div>

    {!! Form::close() !!}
@endsection