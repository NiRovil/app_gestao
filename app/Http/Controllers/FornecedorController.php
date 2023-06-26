<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){

        $titulo = ['Fornecedor'];

        return view('app.fornecedor.index', compact('titulo'));
    }

    public function listar(){

        $titulo = ['Listar'];
        return view('app.fornecedor.listar', compact('titulo'));
    }

    public function adicionar(Request $request){

        if($request->input('_token') != ''){
            $regras = [
                'nome' => 'required',
                'UF' => 'required|min:2|max:2',
                'email' => 'required|email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido.',
                'UF.min' => 'O campo UF deve conter somente 2 caracteres.',
                'UF.max' => 'O campo UF deve conter somente 2 caracteres.',
                'email' => 'Insira um email válido.'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            /* Salvando fornecedor com base em cada atributo.
                $fornecedor = new Fornecedor();
                $fornecedor->nome = $request->input('nome');
                $fornecedor->UF = $request->input('uf');
                $fornecedor->email = $request->input('email');

                $fornecedor->save();
            */
        }


        $titulo = ['Adicionar'];
        return view('app.fornecedor.adicionar', compact('titulo'));
    }
}
