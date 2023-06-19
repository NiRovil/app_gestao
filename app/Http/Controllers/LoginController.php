<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $titulo = ['titulo' => 'Login'];

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválido!';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário login!';
        }

        return view('site.login', compact('titulo', 'erro'));
    }

    public function autenticar(Request $request) {
        
        //Definindo regras
        $regras = [
            'usuario' => 'email|required',
            'senha' => 'required',
        ];

        $mensagem = [
            'usuario.email' => 'Insira um email válido!',
            'usuario.required' => 'O email é obrigatório!',
            'senha.required' => 'A senha deve ser preenchida!',
        ];

        $request->validate($regras, $mensagem);

        //Recuperando paramentros
        $email = $request->get('usuario');
        $pass = $request->get('senha');

        //Iniciando o model User
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $pass)->get()->first();

        if(isset($usuario->name)){

            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.fornecedores');
        }
        else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
