<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\tb_form_doc;
use Mail;
use Auth;




class UploadController extends Controller
{
    
    public function store(Request $request,tb_form_doc $tb_form_doc)
    {   
        if ($request->file('anexar')->isValid()) 
            {    
                
                $protocolo=(string)$request->protocolo;
                $nome_cliente=(string)$request->nome_cliente;
                $nome_responsavel=(string)$request->nome_responsavel;
                $num_art=(string)$request->num_art;
                $tipo_projeto=(string)$request->tipo_projeto;
                $entrada=(string)$request->radio_analise;
                $separa=(string)'_';      
                $extension = $request->anexar->extension();
                $nameFile = $entrada.$num_art.$nome_cliente.$separa.$nome_responsavel.$separa.$protocolo.'.'.$extension;
                $request->nome_arquivo=$nameFile;
                $ano_pasta = date("Y").'/';
                $mes_pasta = date("m").'/';
                $dia_pasta = date("d-m").'/';
                $pasta_projeto = $tipo_projeto.'/';              
                 
                $upload = $request->anexar->storeAs('DocumentosZip/'.$ano_pasta.$mes_pasta.$dia_pasta.$pasta_projeto, $nameFile);
                
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
                if ( !$upload ){
                    
                            
                            return redirect()
                                       ->back()
                                      ->with('error','Falha ao fazer upload')
                                     ->withInput(); 
                            
                    }
                    else {
                        $tabela=$tb_form_doc->gravaformdoc($request);
                        #return $tabela;
                         $mensagem['mensagem'] = "Seu protocolor é: ".$protocolo;
                         Mail::send('form.email', ['mensagem' => $mensagem['mensagem']], function($m){
                         $m->from('pjceara@satel-sa.com', 'Suporte');
                         $m->to(Auth::user()->email)->subject('Ceara - Número de protocolo.');
                        });
                        
                        
                        
                        
                        return 'Sucesso Seu protocolo é: '.$protocolo;
                    }
                    
                    
            }
    }
}
