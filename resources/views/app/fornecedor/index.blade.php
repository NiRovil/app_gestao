@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>

        @component('app.fornecedor.layouts._components.menus')
        @endcomponent

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action={{route('app.fornecedor.listar')}}>
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="UF" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" placeholder="Email" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection