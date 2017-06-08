@extends('admin')

@section('content')

    <div class="text-center">
        <h5><i class="fa fa-"></i> Lista de Livros:</h5>
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
                    <th class="text-center">Imagem</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Edição</th>
                    <th class="text-center">Quatidade</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Acções</th>
                </tr>
            </thead>


            <tbody>
            @foreach ($livro as $l)
                <tr>
                    <td><img src="/img/{{$l->foto}}"></td>
                    <td>{{ $l->documento}}</td>
                    <td>{{ $l->titulo}}</td>
                    <td>{{ $l->autor->nome }}</td>
                    <td>{{ $l->area->designacao }}</td>
                    <td>{{ $l->edicao }} edição</td>
                    <td>{{ $l->quantidade }} Units </td>
                    <td>{{ $l->preco }} MT </td>
                    <td><a href="{{route('livros.edit',$l->id)}}" class="btn btn-warning btn-md">Alterar</a></td>

                    {{--<td>--}}
                        {{--<a href="docs/{{$l->documento}}" download="{{$l->documento}}">--}}
                            {{--<button type="button" class="btn btn-primary">--}}
                                {{--<i>Baixar</i>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                    {{--</td>--}}

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['livros.destroy', $l->id]]) !!}
                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>

@endsection
