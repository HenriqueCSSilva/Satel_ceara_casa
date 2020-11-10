<?php


Route::group(['middleware' => ['auth'] ], function(){       

    Route::get('/logout', function () {
        return view('./auth/login');
    });

   
    Route::get('/home', function () {
        return view('./home');
    });

    Route::get('/ingresso', function () {
        return view('./form/form');
    });

    Route::get('/teste', function () {
        return view('./cliente/teste');
    }); 

    Route::get('/consulta', ['as' => 'cliente.resumo_consulta',
    'uses' =>'ConsultaController@ConsultaResumoOrdens']);

    Route::post('uploadForm', 'UploadController@store')->name('uploadForm');
    //Rotas para redefinição de senha
    Route::get('novaSenha', ['as' => 'esqueciSenha', 'uses' => 'Auth\ResetPasswordController@esqueciSenha']);
    Route::post('redefinirSenha', ['as' => 'prepararRedSenha', 'uses' => 'Auth\ResetPasswordController@prepararRedSenha']);
    Route::get('escolherNovaSenha/{codigo}', ['as' => 'escolherNovaSenha', 'uses' => 'Auth\ResetPasswordController@novaSenha']);
    Route::post('alterarSenha', ['as' => 'alterarSenha', 'uses' => 'Auth\ResetPasswordController@inserirNovaSenha']);
    Route::get('configurarSenha', ['as' => 'configurarSenha', 'uses' => 'Auth\ResetPasswordController@configurarSenha']);
    Route::post('atualizarSenha', ['as' => 'atualizarSenha', 'uses' => 'Auth\ResetPasswordController@atualizarSenha']);
    /**************************************************************************************************************** */

 });

Route::get('/', function () {
    return view('./auth/login');
});
Auth::routes();