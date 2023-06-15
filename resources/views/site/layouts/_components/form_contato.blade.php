{{$slot}}

<form action={{route('site.contato')}} method="POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class={{$borda}}>
    @if($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class={{$borda}}>
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class={{$borda}}>
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contato" class={{$borda}}>
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos_contato as $key => $motivo_contato)
            <option value={{$motivo_contato['id']}} {{old('motivo_contato') == $motivo_contato['id'] ? 'selected' : ''}}>{{$motivo_contato['motivo_contato']}}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contato') ? $errors->first('motivo_contato') : ''}}
    <br>
    <textarea name="mensagem" class={{$borda}}>{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem.'}}</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class={{$borda}}>ENVIAR</button>
    
</form>