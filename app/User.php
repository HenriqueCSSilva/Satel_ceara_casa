<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\PasswordReset;
use Auth;
use Hash;
use Mail;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','telefone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function prepararRedSenha($dados){
      // dd($dados);
      $user = DB::table('users')->where('email', '=', $dados['email'])->get();

      if(count($user) == 0){
        return false;
      }

      else{
        $user = User::find($user[0]->id);
      }

      if(count(DB::table('password_resets')->where('email', '=', $user->email)->get()) > 0){
        return false;
      }

      $carac = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvXxYyWwZz";

      $codigo['token'] = $user->id.str_shuffle($carac);
      $codigo['email'] = $user->email;
      DB::table('password_resets')->insert(
        [
        'email' => $user->email,
        'token' => $codigo['token'],
        'created_at' => now()
        ]
      );

      $GLOBALS['email'] = $dados['email'];

      Mail::send('auth.passwords.emailSenha', ['token' => $codigo['token']], function($m){
        $m->from('suporte@satel.com.br', 'Suporte');
        $m->to($GLOBALS['email'])->subject('Satel - Link para redefinição de senha.');
      });

      return true;
    }

    public function mudarSenha($dados, $cod){
      if(count(DB::table('users')->where('email', '=', $dados['email'])->get()) == 0){
          return 'Email não cadastrado.';
      }
      else if(count(DB::table('password_resets')->where('token', '=', $cod['token'])->get()) == 0){
        return 'Código Inexistente.';
      }
      else if(DB::table('password_resets')->where('email', '=', $dados['email'])->get()[0]->token != $cod['token']){
        return 'Código Inválido';
      }

      else{
        $user = DB::table('users')->where('email', '=', $dados['email'])->get()[0];
        $user = User::find($user->id);
        $user->password = Hash::make($dados['password']);
        $user->save();
        DB::table('password_resets')->where('email', '=', $dados['email'])->delete();
        return 'Senha redefinida.';
      }
    }
}
