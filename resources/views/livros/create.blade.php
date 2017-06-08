@extends('admin')

@section('content')

    {!! Form::open(['url' => 'livros', 'files'=>true]) !!}

    <div class="text-center">
        <h5><i class="fa fa-pencil"></i> Registo de Livros:</h5>
        <hr class="mt-2 mb-2">
    </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::text('titulo',null,['placeholder'=>'Introduza o titulo do livro']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::select('autor_id', $autores, null, ['class'=>'mdb-select', 'placeholder'=>'Selecione o autor do livro']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::select('area_id', $areas, null, ['class'=>'mdb-select', 'placeholder'=>'Selecione a area do livro']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::number('edicao',null,['placeholder'=>'Introduza o numero da Edicao do livro']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::text('editora',null,['placeholder'=>'Introduza o nome da editora do livro']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::number('quantidade',null,['placeholder'=>'Introduza a quantidade de exemplares']) !!}
        </div>

        <div class="md-form col-md-5 col-md-offset-1">
            {!! Form::number('preco',null,['placeholder'=>'Introduza preco por unidade do livro']) !!}
        </div>

        <div class="file-field col-lg-5">
            <div class="btn btn-primary btn-sm">
                <span>Escolha o livro</span>
                <input type="file" name="documento">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Busque o livro">
            </div>
        </div>


        <br>
        <br>

        <div class="file-field col-lg-5">
            <div class="btn btn-primary btn-sm">
                <span>Escolha a Capa</span>
                <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Busque o foto">
            </div>
        </div>

    <br>
    <br>

    <div class="md-form col-md-9 col-md-offset-1">
        {!! Form::submit('GRAVAR', ['class' => 'btn btn-primary btn-sm']) !!}
    </div>
    {!! Form::close() !!}

@stop