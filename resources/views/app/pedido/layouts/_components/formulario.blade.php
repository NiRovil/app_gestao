<div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right: auto;">
        
        @if (isset($pedido))
        <form action="{{route('pedido.update', ['pedido' => $pedido['id']])}}" method="POST">
            @method('PUT')   
        @else
        <form action="{{route('pedido.store')}}" method="POST">
        @endif
            @csrf

            <select name="cliente_id">
                <option value="0">--Selecione um cliente--</option>
                @foreach ($clientes as $cliente)
                    <option value={{$cliente['id']}} {{($pedido['cliente_id'] ?? old('cliente_id')) == $cliente['id'] ? 'selected' : ''}} >{{$cliente['nome']}}</option>
                @endforeach
            </select>
            {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}

            <button type="submit" class="borda-preta">Cadastrar/Editar</button>
        </form>
    </div>
</div>