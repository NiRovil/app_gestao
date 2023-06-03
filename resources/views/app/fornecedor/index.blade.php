<h3>Fornecedor</h3>

{{-- @dd($fornecedores); >> mostra a saída da variável --}}

{{-- @isset testa se o argumento esta setado --}}
@isset($fornecedores)

    @for($i = 0; isset($fornecedores[$i]); $i++)
        
        Fornecedor: {{$fornecedores[$i]['nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>

        {{-- @unless faz um teste if invertendo a saída booleana --}}
        @unless ($fornecedores[$i]['status'] == 'S')
            Fornecedor inativo!
        @endunless
        <br>
        
        {{-- o operador ?? testa se o indice não estiver definido ou for null 
            mostra a própria variável, senão um output padrão --}}
        CNPJ: {{$fornecedores[$i]['CNPJ'] ?? 'Vazio'}}
        <br>
        Telefone: ({{$fornecedores[$i]['DDD']}}) {{$fornecedores[$i]['Telefone']}}
        
        {{-- testando switch case --}}
        @switch($fornecedores[$i]['DDD'])
            @case('41')
                'Curitiba - PR'
                @break
            @case('11')
                'São Paulo - SP'
                @break
            @default
                'Cidade desconhecida!'
        @endswitch
        <hr>
    @endfor
@endisset

<br>

{{-- testando forelse --}}
@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)
        @if ($loop->first)
            Total de registros: {{$loop->count}}
            <br>
            <br>
        @endif
        Iteração atual: {{$loop->iteration}}
        <br>
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>

        @unless ($fornecedor['status'] == 'S')
            Fornecedor inativo!
        @endunless

        <br>
        CNPJ: {{$fornecedor['CNPJ'] ?? 'Vazio'}}
        <br>
        Telefone: ({{$fornecedor['DDD']}}) {{$fornecedor['Telefone']}}

        @switch($fornecedor['DDD'])
            @case('41')
                'Curitiba - PR'
                @break
            @case('11')
                'São Paulo - SP'
                @break
            @default
                'Cidade desconhecida!'
        @endswitch
        <hr>
    @empty
        Nenhum fornecedor cadastrado!
    @endforelse
@endisset