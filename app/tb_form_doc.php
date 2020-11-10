<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tb_form_doc extends Model
{
   public  function  gravaformdoc(Request $formdoc)
   {
        $user = auth()->user();                          
        $usuario_email=($user->email);
        $usuario_name= ($user->name);  
        
        $data_up_form =date("Y/m/d H:i:s");
        $ano = date("Y");
        /*****************************/
        
        $tipo_projeto=(string)$formdoc->tipo_projeto;
        $nome_cliente=(string)$formdoc->nome_cliente;
        $radio_analise=(string)$formdoc->radio_analise;
        $nome_responsavel=(string)$formdoc->nome_responsavel;
        $num_art=(string)$formdoc->num_art;
        $endereco=(string)$formdoc->endereco;
        $nome_arquivo=(string)$formdoc->nome_arquivo;
        $protocolo=(string)$formdoc->protocolo;

/* SQL Consulta */
        $gera_carta = DB::select("SELECT max(cast( right (left(n_carta,LENGTH(n_carta)-5),
        LENGTH( left(n_carta,LENGTH(n_carta)-5))-3 ) as UNSIGNED))+1 as verificador 
        from tb_demanda where data_entrada >= year(current_date())");
        $num_carta=$gera_carta[0];
        $carta_atual = -1;    
        foreach ($num_carta as $key => $value) {
                $carta_atual=$value ;
            }

            
        

/***************/

       
        $retorno =DB::table('tb_form_docs')->insert(array('tipo_projeto' => $tipo_projeto,
                            'nome_cliente' => $nome_cliente,'entrada'=>$radio_analise,
                                     'responsavel_tec' => $nome_responsavel,
                                     'art'=>$num_art,'endereco' => $endereco, 
                                     'nome_arquivo' => $nome_arquivo,'protocolo' => $protocolo,'email'=>$usuario_email,
                                     'usuario'=>$usuario_name,'data_hora'=>$data_up_form));
                                     
       
       
       $demanda = DB::table('tb_demanda')->insert(array('protocolo' => $protocolo,'projeto' => $tipo_projeto,
                            'nome_cliente' => $nome_cliente,
                            'data_entrada'=>$data_up_form,
                            'art'=>$num_art,
                            'parecer'=>'EM ANÁLISE',
                            'envio_carta'=> 'PENDENTE',
                            'email'=>$usuario_email,
                            'n_carta'=>'CE.00'.$carta_atual.'/2020',
                            'usuario'=>$usuario_name

                            ));
       
                                    return $retorno;
                                    return $demanda;
    }
}