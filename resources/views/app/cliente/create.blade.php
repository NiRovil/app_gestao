@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Adicionar Cliente</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('cliente.index') }}">Voltar</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>

        @component('app.cliente.layouts._components.formulario')
        @endcomponent
    </div>

@endsection