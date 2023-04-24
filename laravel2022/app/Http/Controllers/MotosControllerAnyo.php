<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;

class MotosControllerAnyo extends Controller
{
    public function updateMotoAnyo($x, $y)
    {
        App\Motocicleta::where('Anyo',$x)->update(['Anyo' => $y]);
        $modificacion = "A&ntilde;o modificado de $x --> $y.";
        return view('motocicletas/update', ['modificacion' => $modificacion]);
    }
}?>