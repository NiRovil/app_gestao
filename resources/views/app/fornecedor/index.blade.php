<h3>Fornecedor</h3>

{{-- @dd($fornecedores); >> mostra a saída da variável --}}

{{-- @isset testa se o argumento esta setado --}}
@isset($fornecedores)
    <br>
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>

    {{-- @unless faz um teste if invertendo a saída booleana --}}
    @unless ($fornecedores[0]['status'] == 'S')
        Fornecedor inativo!
    @endunless
    <br>

    @isset($fornecedores[1]['CNPJ'])
        CNPJ: {{$fornecedores[1]['CNPJ']}}

        {{-- @empty testa se o argumento está vazio --}}
        @empty($fornecedores[1]['CNPJ'])
            - Vazio
        @endempty
    @endisset
@endisset