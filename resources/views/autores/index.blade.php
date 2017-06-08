@extends('admin')

@section('content')

    <div class="text-center">
        <h5><i class="fa fa-"></i> Lista de Autores:</h5>
        <hr class="mt-2 mb-2">
    </div>

    <div class="table-responsiv">

        <form class="navbar-form navbar-right" role="search">
            <div class="md-form col-md-4 col-md-offset-2">
                <input type="text" id="txtpesquisar" placeholder="Pesquisar">
            </div>
        </form>

        <table id="tabela" class="table product-table">
            <thead>
                <tr>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Apelido</th>
                    <th class="text-center">Genero</th>
                    <th class="text-center">DataNasc</th>
                    <th class="text-center">Acções</th>
                </tr>
            </thead>


            <tbody>
            @foreach ($autor as $a)
                <tr>
                    <td><img src="/img/{{$a->foto}}"></td>
                    <td>{{ $a->nome}}</td>
                    <td>{{ $a->apelido }}</td>
                    <td>{{ $a->genero }} </td>
                    <td>{{ $a->dataNascimento }} </td>
                    <td><a href="{{route('autores.edit',$a->id)}}" class="btn btn-warning btn-md">Alterar</a></td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['autores.destroy', $a->id]]) !!}
                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>

@endsection
