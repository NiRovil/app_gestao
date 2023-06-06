<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){

        $titulo = ['titulo' => 'Contato'];
        
        return view('site.contato', compact('titulo'));
    }
}
