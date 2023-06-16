<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(){
        
        $titulo = ['titulo' => 'Contato'];
        $motivos_contato = MotivoContato::all();

        return view('site.contato', compact('titulo', 'motivos_contato'));
    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ];

        $mensagem = [
            'email.email' => 'Digite um email válido!',
            'motivo_contato.required' => 'Selecione o motivo de contato!',
            'required' => 'O campo :attribute deve ser preenchido!'
        ];

        $request->validate($regras, $mensagem);

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivos_contato_id = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();

        return redirect()->route('site.principal');
    }
}
