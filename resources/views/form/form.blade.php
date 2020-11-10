@extends('layouts.app')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>


      swal({   
        title: 'Informe.',   
        text:'Projetos abaixo de 10Kw \n deven ser enviados para:  ligacaonovagd@enel.com',  
       
        type: 'success',   
        cancelButtonText: 'Cancelar',
                    showCancelButton: true,   
        confirmButtonColor: '#00c292',   
        confirmButtonText: 'Sim, Cadastrar',   
        closeOnConfirm: true 
    }    );

                </script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div style = "border:none;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF;" class="card-header">{{ __('Solicitação') }}</div>

                <div style="background-color: #554c44;" class="card-body">
                    <form method="POST" action="{{ route('uploadForm')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Projeto') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name = "tipo_projeto" required >
                                    <option value="1" disabled selected>Selecione uma opção</option>
                                    <option value="2">Análise Subestações até 300 kVA</option>
                                    <option value="3">Análise Subestações acima de 300 kVA</option>
                                    <option value="4">Estudo de Coordenação e Seletividade da Proteção</option>
                                    <option value="5">Análise Geração em Emergência</option>
                                    <option value="6">Análise Geração em Rampa</option>                                  
                                    <option value="7">Análise de Medição Agrupada</option>
                                    <option value="8">Análise Microgeração Distribuída</option>
                                    <option value="9">Análise Minigeração Distribuída até 300 kW</option>
                                    <option value="10">Análise Minigeração Distribuída acima de 300 kW</option>
                                    <option value="11">Análise de Projetos de Baixa Tensão</option>                                  
                            </select>
                                @error('tipo_projeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       
                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Entrada') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name ="radio_analise">
                                    <option value="" disabled selected>Selecione uma opção</option>
                                    <option>Análise</option>
                                    <option>Reanálise</option>
                                                                  
                            </select>
                                @error('tipo_projeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Cliente') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="nome_cliente" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="text_nome_responsavel" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Responsavel Técnico') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nome_responsavel') is-invalid @enderror" name="nome_responsavel" value="{{ old('nome_responsavel') }}" required autocomplete="nome_responsavel" autofocus>

                                @error('nome_responsavel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="text_numero_art" class="col-md-4 col-form-label text-md-right">{{ __('Nº ART') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('numero_art') is-invalid @enderror" name="num_art" value="{{ old('numero_art') }}" required autocomplete="numero_art" autofocus>

                                @error('numero_art')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="text_endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                            <div class="col-md-6">
                                <input id="text_endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required autocomplete="endereco" autofocus>

                                @error('numero_art')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label>Anexar arquivos em pasta compactada .zip/.rar. (Diagrama Unifilar preferencialmente em .PDF)</label>
                            <div style = "margin-bottom:1em;" class="col-md-6 offset-md-4">
                            <abbr title="Anexar arquivo em: .zip,.rar ou .PDF unificado">
                            <input style = "background: #38322D;
                            border: medium none;
                            color: #FFFFFF;
                            cursor: pointer;
                            display: inline-block;
                            padding-top: 0.6em;
                            padding-bottom: 2.5em;
                            text-transform: uppercase;" type="file" class="form-control @error('anexar') is-invalid @enderror" name="anexar" value="{{ old('anexar') }}" required autocomplete="anexar" autofocus>
                            </abbr>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style = "background-color:#81BE01; border: none; width:100%;" id ="btn_enviar" type="submit" class="btn btn-success">
                                    {{ __('Enviar') }}
                                </button>

                            <input type='submit' value="teste"  onclick="alert()" />
                            </div>
                        </div>
                        <input name="protocolo"  style="visibility: hidden;" value=<?php echo $protocolo = date("YmdHis"); ?> >
                    </form>
                </div>
            </div>
            <div style = "border:none; margin-top: 1em;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF; text-align: center;" class="card-header">
                <button style="background-color: transparent; color: #FFFFFF; text-align: center; width: 100%; border: none; outline: none;" data-toggle="collapse" data-target="#geracaoDiv" >Documentos Para Geração Distribuida</button>
                </div>
                    
                <div style = "padding-left: 1.5em; background-color: #554c44; overflow:hidden;" id = "geracaoDiv" class="card-body, collapse">
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Formulário de solicitação de acesso para microgeração com potência igual ou inferior a 10 kW </label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Formulário de solicitação de acesso para microgeração com potência superior a 10 kW </label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Parecer de acesso (Minigeração Distribuída)</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">ART/TRT</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Registro de conformidade do inversor</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Localização GPS da unidade onde será instalado o projeto</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Memorial Descritivo</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Diagrama Unifilar</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Documentação pessoal do cliente</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Procuração</label>
                    </div>
                </div>
            </div>
            
            <div style = "border:none; margin-top: 0em;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF; text-align: center;" class="card-header">
                <button style="background-color: transparent; color: #FFFFFF; text-align: center; width: 100%; border: none; outline: none;" data-toggle="collapse" data-target="#medicaoDiv" >Documentos Para Medição Agrupada</button>
                </div>
                    
                <div style = "padding-left: 1.5em; background-color: #554c44; overflow:hidden;" id = "medicaoDiv" class="card-body, collapse">
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Diagrama unifilar</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Memorial Descritivo</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Cálculo da queda de tensão</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Especificação dos equipamentos</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Especificação do quadro de carga geral e de cada unidade consumidora com as informações: cargas, equipamentos, tomadas, chuveiros, bombas, elevadores, etc.</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Detalhes de caminhamento do eletrodutos, de todas as caixas, bem como dos cabos de comunicação</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Apresentação de uma carta conforme modelo do Anexo A, assinada pelo responsável do prédio, autorizando a ligação das unidades consumidoras em medição eletrônica centralizada</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Duas vias do projeto contendo:</label>
                    </div>
                    <ul class="list-group" style="margin-left: -1em; background-color: #554c44; color: #FFFFFF; text-align: left;">
                    <li style="background-color: #554c44; color: #FFFFFF; text-align: left;" class="list-group-item">A instalação da Caixa de medição eletrônica predial com detalhes;</li>
                    <li style="background-color: #554c44; color: #FFFFFF; text-align: left;" class="list-group-item">A localização do ponto de entrega da múltipla unidade consumidora e da caixa do concentrador primário;</li>
                    <li style="background-color: #554c44; color: #FFFFFF; text-align: left;" class="list-group-item">A conexão do ramal de entrada com o barramento da caixa de medição eletrônica predial;</li>
                    <li style="background-color: #554c44; color: #FFFFFF; text-align: left;" class="list-group-item">Trajeto dos cabos;</li>
                    <li style="background-color: #554c44; color: #FFFFFF; text-align: left;" class="list-group-item">Localização dos postes particulares e outros detalhes técnicos que foram necessários para aprovação do projeto.</li>
                    </ul>
                    <div class = "row"><label></label></div>   
                </div>
            </div>
            
            <div style = "border:none; margin-top: 0em;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF; text-align: center;" class="card-header">
                <button style="background-color: transparent; color: #FFFFFF; text-align: center; width: 100%; border: none; outline: none;" data-toggle="collapse" data-target="#subestacaoDiv" >Documentos Para Subestação</button>
                </div>
                    
                <div style = "padding-left: 1.5em; background-color: #554c44; overflow:hidden;" id = "subestacaoDiv" class="card-body, collapse">
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Memorial Descritivo</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Anotação de Responsabilidade Técnica – ART emitida pelo CREA</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Licença emitida pelo órgão responsável pela preservação do meio ambiente, quando a unidade consumidora localizar-se em área de preservação ambiental</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Autorização federal para construção de linha da Enel Distribuição Ceará destinada a uso exclusivo do interessado;</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Os desenhos devem ser apresentados em papel, a partir de impressoras gráficas com dimensões padronizadas pela NBR 10068;</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Planta de situação em escala ou com todas as dimensões (cotas) necessárias para análise do projeto, contendo localização do ponto de entrega pretendido, incluindo as ruas adjacentes ou acessos, o código da estrutura com rede de distribuição de MT trifásica mais próxima e algum ponto de referência significativo. A localização do ponto de entrega deve ser identificada na planta de situação, através de coordenadas geográficas em latitude e longitude (X, Y UTM). Caso haja subestação afastada da estrutura de medição, indicar também o caminhamento dos condutores primários e localização das caixas de passagem;</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">A planta de situação deve conter os limites da propriedade da unidade consumidora, indicando as
edificações ou propriedades adjacentes;</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Na planta de situação da alínea “f” devem ser indicados, quando houver, linhas de distribuição alta,
média e baixa tensão, ferrovias, rodovias, gasodutos, rios, açudes e lagoas entre o ponto de entrega
e a estrutura mais próxima de MT com rede trifásica;</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Diagrama unifilar, contendo todos os equipamentos, dispositivos e materiais essenciais, desde o
ponto de entrega até a proteção geral de baixa tensão, contendo, ainda, os seus principais valores
elétricos nominais, faixas de ajustes e ponto de regulação. Caso exista geração própria, indicar o
ponto de reversão, seja em MT ou BT, detalhando o sistema de reversão adotado, conforme item
6.12</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Quando houver desnível entre a estrutura de medição e a estrutura de derivação do ramal de
medição, o mesmo deve ser indicado na planta de situação</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Quando os padrões de estruturas empregados no projeto de rede forem diferentes dos Padrões de
Estrutura em vigor na Enel Distribuição Ceará ou adotados pelas NBR 15688, o interessado deve apresentar os desenhos das estruturas utilizadas, com detalhes que possibilitem uma avaliação
quanto à segurança e confiabilidade</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Documento emitido pela prefeitura, certificando o limite da via pública com a propriedade da unidade
consumidora, quando a disposição das edificações e da via pública, não permitir a verificação deste
limite por parte da Enel Distribuição Ceará</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Lista das operadoras de telefonia celular com sinal disponível no local onde será instalada a estrutura
de medição</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">O desenho do padrão de medição deve ser apresentado com vista frontal, laterais e superiores e com
todos os cortes necessários para a visualização do recuo e do afastamento mínimo das edificações</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Condutores de circuitos diferentes devem ser separados eletricamente. Circuitos diferentes devem
ser identificados no projeto, não sendo permitido o cruzamento de circuitos elétricos,
compartilhamento de eletrodutos e de caixas de passagem</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Arranjo físico das estruturas e equipamentos</label>
                    </div>
                </div>
            </div>
            
            <div style = "border:none; margin-top: 0em;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF; text-align: center;" class="card-header">
                <button style="background-color: transparent; color: #FFFFFF; text-align: center; width: 100%; border: none; outline: none;" data-toggle="collapse" data-target="#geracaoEmergenciaDiv" >Documentos Para Geração de Emergência</button>
                </div>
                    
                <div style = "padding-left: 1.5em; background-color: #554c44; overflow:hidden;" id = "geracaoEmergenciaDiv" class="card-body, collapse">
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Uma via da ART – Anotação de Responsabilidade Técnica, emitida pelo Conselho Regional de Engenharia e Agronomia - CREA</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Plantas com cortes e detalhes da cabine do gerador</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Diagrama unifilar elétrico e funcional, contendo detalhes do intertravamento e da proteção, não sendo necessário a apresentação dos ajustes das funções de proteção para análise</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Detalhes do sistema de aterramento</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Termo de Responsabilidade por Operação de Grupo Gerador, assinado pelo proprietário</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Localização GPS da unidade onde será instalado o projeto</label>
                    </div>
                    <div class = "row">
                        <label style="background-color: #554c44; color: #FFFFFF; text-align: left;">Memorial Descritivo</label>
                    </div>      
                </div>
            </div>
            
            <div style = "border:none; margin-bottom: 5em;" class="card">
        </div>
    </div>
</div>
@endsection
