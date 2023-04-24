<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;

class MotosController extends Controller
{
    public function verMotoMatricula($cadena)
    {
        $motos = App\Motocicleta::where('Matricula', $cadena)->orderBy('Matricula', 'desc')->get();
        return view('motocicletas/ver', ['motos' => $motos]);
        // return view('articulos.ver', ['id' => $id]);
    }
}?>