@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Adicionar Fornecedor</p>
        </div>

        @component('app.fornecedor.layouts._components.menus')
        @endcomponent

        @component('app.fornecedor.layouts._components.formulario', ['msg' => $msg])
        @endcomponent
    </div>

@endsection