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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
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
                        @foreach ($result as $fornecedor)
                            <tr>
                                <td>{{$fornecedor['nome']}}</td>
                                <td>{{$fornecedor['UF']}}</td>
                                <td>{{$fornecedor['email']}}</td>
                                <td>Excluir</td>
                                <td><a href={{route('app.fornecedor.editar', $fornecedor['id'])}}>Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection