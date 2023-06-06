<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){

        $titulo = ['titulo' => 'Contato'];
        var_dump($_POST);
        return view('site.contato', compact('titulo'));
    }
}
