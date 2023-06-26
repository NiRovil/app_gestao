@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Editar Fornecedor</p>
        </div>

        @component('app.fornecedor.layouts._components.menus')
        @endcomponent
        
        @component('app.fornecedor.layouts._components.formulario', ['fornecedor' => $fornecedor, 'msg' => $msg]) 
        @endcomponent
    </div>

@endsection