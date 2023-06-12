<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class ContatoController extends Controller
{
    public function contato(){

        $titulo = ['titulo' => 'Contato'];
        $fornecedores = Fornecedor::all();
        var_dump($fornecedores);
        //var_dump($_POST);
        return view('site.contato', compact('titulo', 'fornecedores'));
    }
}
