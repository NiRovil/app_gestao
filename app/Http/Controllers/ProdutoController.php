<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $titulo = ['Produtos'];
        $produtos = Produto::paginate(10);
        $result = $request->all();

        return view('app.produto.index', compact('produtos', 'titulo', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = ['Adicionar'];
        $unidades = Unidade::all();
        return view('app.produto.create', compact('titulo', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'unidade_id.exists' => 'O campo :attribute deve ser selecionado.'
        ];

        $request->validate($regras, $feedback);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        $titulo = ['Informações'];
        return view('app.produto.show', compact('titulo', 'produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $titulo = ['Editar'];
        $unidades = Unidade::all();
        return view('app.produto.edit', compact('titulo', 'produto', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
