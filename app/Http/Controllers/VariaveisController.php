<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VariaveisController extends Controller
{
    public function variaveis(){
        $p1 = 10;
        $p2 = 20;

        $p3 = [
            'a' => 1,
            'b' => 2,
            'c' => 3
        ];

        //return view('site.variaveis', ['p1' => $p1, 'p2' => $p2, 'p3' => $p3]); usando array associativo
        return view('site.variaveis', compact('p1', 'p2', 'p3')); //usando compact()
    }
}
