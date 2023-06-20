<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {

        $titulo = ['Produto'];

        return view('app.produto', compact('titulo'));
    }
}
