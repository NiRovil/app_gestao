@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.index') }}">Voltar</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>

        @component('app.produto.layouts._components.formulario', ['produto' => $produto, 'unidades' => $unidades])
        @endcomponent
    </div>

@endsection