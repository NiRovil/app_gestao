@extends('app.layouts.base')
@section('titulo', $titulo[0])
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Adicionar Fornecedor</p>
        </div>

        @component('app.fornecedor.layouts._components.menus')
        @endcomponent

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action={{route('app.fornecedor.adicionar')}}>
                    @csrf
                    <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="UF" value="{{old('UF')}}" placeholder="UF" class="borda-preta">
                    {{$errors->has('UF') ? $errors->first('UF') : ''}}

                    <input type="text" name="email" value="{{old('email')}}" placeholder="Email" class="borda-preta">
                    {{$errors->has('email') ? $errors->first('email') : ''}}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection