<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $titulo = ['Home'];

        return view('app.home', compact('titulo'));
    }
}
