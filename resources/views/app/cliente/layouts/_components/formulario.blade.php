<div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right: auto;">
        
        @if (isset($cliente))
        <form action="{{route('cliente.update', ['cliente' => $cliente['id']])}}" method="POST">
            @method('PUT')   
        @else
        <form action="{{route('cliente.store')}}" method="POST">
        @endif
            @csrf

            <input type="text" name="nome" value="{{$cliente['nome'] ?? old('nome')}}" placeholder="Nome" class="borda-preta">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}

            <button type="submit" class="borda-preta">Cadastrar/Editar</button>
        </form>
    </div>
</div>