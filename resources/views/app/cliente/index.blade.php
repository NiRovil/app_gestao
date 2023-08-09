@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Clientes</p>
        </div>

        @component('app.cliente.layouts._components.menus')
        @endcomponent

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente['nome']}}</td>
                                
                                <td><a href="{{route('cliente.show', ['cliente' => $cliente['id']])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$cliente['id']}}" action="{{route('cliente.destroy', ['cliente' => $cliente['id']])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cliente['id']}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('cliente.edit', ['cliente' => $cliente['id']])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$clientes->appends($result)->links()}}
            </div>
        </div>
    </div>

@endsection