<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    public function index()
    {

        $generos= Genero::all();
        
        return view('criarcontato', ['generos' =>$generos]);
    }
    public function listarGeneros()
    {
        $generos = Genero::all();

        return view('listadecontatos', ['generos' => $generos]);
    }
}
