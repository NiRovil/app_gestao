@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Editar Detalhes Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="">Voltar</a>
                </li>
            </ul>
        </div>

        @component('app.produto_detalhe.layouts._components.formulario', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
        @endcomponent
    </div>

@endsection