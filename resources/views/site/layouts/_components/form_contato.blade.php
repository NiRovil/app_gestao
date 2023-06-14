{{$slot}}

<form action={{route('site.contato')}} method="POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class={{$borda}}>
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class={{$borda}}>
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class={{$borda}}>
    <br>
    <select name="motivo_contato" class={{$borda}}>
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos_contato as $key => $motivo_contato)
            <option value={{$key}} {{old('motivo_contato') == $key ? 'selected' : ''}}>{{$motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class={{$borda}}>{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem.'}}</textarea>
    <br>
    <button type="submit" class={{$borda}}>ENVIAR</button>
    
</form>