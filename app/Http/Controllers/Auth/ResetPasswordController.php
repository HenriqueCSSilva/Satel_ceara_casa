<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Auth;
use Hash;
class ResetPasswordController extends Controller
{


    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private $user;

  public function __construct(User $user){
    $this->user = $user;
  }

  public function getUser(){
    return $this->user;
  }

  public function esqueciSenha(){
    return view('auth.passwords.esqueciSenha');
  }

  public function prepararRedSenha(Request $req){
    $dados = $req->all();

    $resposta = $this->getUser()->prepararRedSenha($dados);
    if($resposta){
        return redirect()->route('esqueciSenha')->with('Sucesso', 'Link para redefinição enviado.');
    }
    else{

        return redirect()->route('esqueciSenha')->with('alert', 'Verifique se você já tem um código no email.');
    }



  }

  public function novaSenha($codigo){
    // dd($codigo);
    $token['token'] = $codigo;
    return view('auth.passwords.novaSenha', compact('token'));
  }
  public function inserirNovaSenha(Request $req){
    $dados = $req->all();
    $token['token'] = $dados['codigo'];


    $resposta = $this->getUser()->mudarSenha($dados, $token);
     //dd($resposta);
    if(strcmp($resposta, 'Senha redefinida.') == 0){
        return view('./auth/login')->with('Sucesso', $resposta);
    }
    else{
        return redirect()->back()->with('alert', $resposta);
    }

  }

  public function configurarSenha(){
    return view('auth.passwords.configurarSenha');
  }

  public function atualizarSenha(Request $req){
    $dados = $req->all();
    $user = User::find(Auth::user()->id);
    $user->password = Hash::make($dados['password']);
    $user->save();
    return view('auth.passwords.configurarSenha')->with('alert', 'Senha Atualizada.');
  
  }

}

/*S@tel0411*/
