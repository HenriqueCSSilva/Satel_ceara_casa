<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\vw_resumo_consulta;

class ConsultaController extends Controller
{
    
    public function ConsultaResumoOrdens(){     
        $cartas = vw_resumo_consulta::recuperaOrdensCliente(); // S-cartas= S-users             variavel
        return view('cliente.resumo_consulta')->with(compact('cartas'));//nomedaviewqvaisercriada   
    }


}
