@extends('admin')

@section('content')

    <div class="text-center">
        <h5><i class="fa fa-"></i> Lista de Áreas:</h5>
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
                    <th class="text-center">Designação</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Acções</th>
                </tr>
            </thead>


            <tbody>
            @foreach ($area as $a)
                <tr>
                    <td>{{ $a->designacao}}</td>
                    <td>{{ $a->descricao }}</td>
                    <td><a href="{{route('areas.edit',$a->id)}}" class="btn btn-warning btn-md">Alterar</a></td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['areas.destroy', $a->id]]) !!}
                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>

@endsection
