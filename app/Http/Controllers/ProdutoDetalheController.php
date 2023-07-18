<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = ['Detalhes do Produto'];
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('titulo', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo 'Cadastrado!';
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        $titulo = ['Detalhes'];

        return view('app.produto_detalhe.show', compact('titulo', 'produto_detalhe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $titulo = ['Editar Detalhes'];
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', compact('titulo', 'produto_detalhe', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        echo 'Atualizado';
        //return redirect()->route('produto_detalhe.show', ['produto_detalhe' => $produto_detalhe->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
