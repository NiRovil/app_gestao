<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function fornecedor(){

        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'CNPJ' => null,
                'DDD' => '41',
                'Telefone' => '0000-0000',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'CNPJ' => '202020',
                'DDD' => '11',
                'Telefone' => '0000-0000',
            ]
        ];

        //$fornecedores = [];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
