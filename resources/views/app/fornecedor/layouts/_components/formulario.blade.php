<div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right: auto;">
        {{$msg ?? ''}}
        <form method="POST" action={{route('app.fornecedor.adicionar')}}>
            <input type="hidden" name="id" value="{{$fornecedor['id'] ?? ''}}">
            @csrf
            <input type="text" name="nome" value="{{$fornecedor['nome'] ?? old('nome')}}" placeholder="Nome" class="borda-preta">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}

            <input type="text" name="UF" value="{{$fornecedor['UF'] ?? old('UF')}}" placeholder="UF" class="borda-preta">
            {{$errors->has('UF') ? $errors->first('UF') : ''}}

            <input type="text" name="email" value="{{$fornecedor['email'] ?? old('email')}}" placeholder="Email" class="borda-preta">
            {{$errors->has('email') ? $errors->first('email') : ''}}

            <button type="submit" class="borda-preta">Cadastrar/Editar</button>
        </form>
    </div>
</div>