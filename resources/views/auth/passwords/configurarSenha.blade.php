@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style = "border:none;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF;" class="card-header">{{ __('Solicitação') }}</div>

                <div style="background-color: #554c44;" class="card-body">
                    <form method="POST" action="{{ route('atualizarSenha')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row col-sm-4">
                          <label>Nova Senha</label>
                          <input type="text" class='form-control' name="password" value="" required>
                        </div>
                        <br>
                        @if(session()->has('Sucesso'))
                          <div class="alert alert- main-bg" style='background-color:#81BE01; color: white;'>
                            {{ session()->get('Sucesso') }}
                          </div>
                        @endif

                        <button style = "background-color:#81BE01; border: none;"class="btn btn-success"type="submit" >
                          Salvar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
