@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                  <form class="user" action="{{ route('prepararRedSenha') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <input name='email' required type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite seu email e você receberá um link para redefinição">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <!-- <label class="custom-control-label" for="customCheck">Lembrar</label> -->
                      </div>
                    </div>
                    @if(session()->has('alert'))
                      <div class="alert alert-danger secondary-bg" style='background: red; color: white;'>
                        {{ session()->get('alert') }}
                      </div>
                    @endif

                    @if(session()->has('Sucesso'))
                      <div class="alert alert-danger secondary-bg" style='background-color:#81BE01; color: white;'>
                        {{ session()->get('Sucesso') }}
                      </div>
                    @endif



                    <button style = "background-color:#81BE01; border: none;"class="btn btn-success"type="submit" >
                      Solicitar redefinição
                    </button>
                    <hr>
                  </form>

                </div>
              </div>
          </div>
  </div>
</div>
@endsection
