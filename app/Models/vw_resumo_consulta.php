<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class vw_resumo_consulta extends Model
{
    protected $table = 'vw_resumo_consulta';

    public static function recuperaOrdensCliente (){
        $userlogado= auth()->user()->name;
        #$resul_vw_resumo_status =vw_resumo_status::select()->where('name','=',$userlogado);           
        $resul_vw_resumo_status =vw_resumo_consulta::select()->where('ingress_por','=',$userlogado)->get();
        return $resul_vw_resumo_status;
    }
}
