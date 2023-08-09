@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Pedidos</p>
        </div>

        @component('app.pedido.layouts._components.menus')
        @endcomponent

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{$pedido['id']}}</td>
                                <td>{{$pedido['cliente_id']}}</td>
                                
                                <td><a href="{{route('pedido.show', ['pedido' => $pedido['id']])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido['id']}}" action="{{route('pedido.destroy', ['pedido' => $pedido['id']])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido['id']}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido' => $pedido['id']])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$pedidos->appends($result)->links()}}
            </div>
        </div>
    </div>

@endsection