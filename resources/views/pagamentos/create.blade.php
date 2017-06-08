@extends('utilizador')

@section('content')
<br>
    <div class="text-center">
        <h4>Efectue o Pagamento através da Leitura do <strong>QrCode</strong> da sua Aplicação - <strong>TakÍ</strong></h4>
        <hr class="mt-2 mb-2">
    </div>

    <div class="row">
        <div class="col-sm-8 col-md-8">
            <div class="text-center">
                <h5><strong>Livros Adicionados</strong></h5>
                {{--<hr class="mt-2 mb-2">--}}<br>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Qtd</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('carinho'))
                        @foreach($carinho->items as $l)
                            <tr>
                                <td class="text-center">{{$l['item']->titulo}}</td>
                                <td class="text-center">{{$l['quantidade']}}</td>
                                <td class="text-center">{{$l['item']->preco}} MT</td>
                                <td class="text-center">{{$l['preco']}} MT</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td class="text-right"><h5><strong>Total a Pagar: </strong></h5></td>
                    <td class="text-center text-danger"><h5><strong>{{$total}} MT</strong></h5></td>
                </tr>
                </table>

            <div class="text-right">
                @foreach($carinho->items as $l)
                <a href="docs/{{$l['item']->documento}}" download="{{$l['item']->documento}}">
                <button type="button" class="btn btn-success btn-lg">Download File</button>
                </a>
                @endforeach
            </div>

        </div>

        <div class="col-sm-4 col-md-4">
            <img src="qrcode.png" alt="QR Code">
        </div>

    </div>

@stop