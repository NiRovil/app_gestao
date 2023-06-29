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

    public function listar(Request $request){

        $nome = $request->input('nome');
        $UF = $request->input('UF');
        $email = $request->input('email');
        

        $fornecedores = Fornecedor::where('nome', 'like', "%".$nome."%")
            ->where('UF', 'like', "%".$UF."%")
            ->where('email', 'like', "%".$email."%")
            ->paginate(2);

        $result = $request->all();
        $titulo = ['Listar'];
        return view('app.fornecedor.listar', compact('titulo', 'fornecedores', 'result'));
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
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
            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Fornecedor editado com sucesso!';
            } else {
                $msg = 'Erro ao editar o fornecedor!';
            }

            $id = $request->input('id');

            return redirect()->route('app.fornecedor.editar', compact('id', 'msg'));
        }

        $titulo = ['Adicionar'];
        return view('app.fornecedor.adicionar', compact('titulo', 'msg'));
    }

    public function editar($id, $msg = '') {
        $titulo = ['Editar'];
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.editar', compact('titulo', 'fornecedor', 'msg'));
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
