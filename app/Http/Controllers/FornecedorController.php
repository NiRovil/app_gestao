<?php

namespace App\Http\Controllers;

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

    public function adicionar(){
        $titulo = ['Adicionar'];
        return view('app.fornecedor.adicionar', compact('titulo'));
    }
}
