@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Listar Fornecedores</p>
        </div>

        @component('app.fornecedor.layouts._components.menus')
        @endcomponent

        <div class="informacao-pagina">
            <div style="align-content: center; margin-left: 5%; margin-right: 5%">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{$fornecedor['nome']}}</td>
                                <td>{{$fornecedor['UF']}}</td>
                                <td>{{$fornecedor['email']}}</td>
                                <td><a href={{route('app.fornecedor.excluir', $fornecedor['id'])}}>Excluir</a></td>
                                <td><a href={{route('app.fornecedor.editar', $fornecedor['id'])}}>Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p>Lista de produtos</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td>{{$produto['id']}}</td>
                                                <td>{{$produto['nome']}}</td>
                                            </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$fornecedores->appends($result)->links()}}
            </div>
        </div>
    </div>

@endsection