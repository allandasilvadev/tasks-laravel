<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        if ( ! session()->has( 'user' ) ) {
            return redirect()->route( 'painel.usuarios.login' );
        }

        return view( 'painel.usuarios.index' );
    }

    public function login()
    {
        return view( 'painel.usuarios.login' );
    }

    public function logar( Request $request ) 
    {
         $validator = Validator::make( $request->all(), [
            'cilogin' => 'required',
            'cisenha' => 'required'
        ]);

        if ( $validator->fails() ) {
            return redirect()->route( 'painel.usuarios.login' )->with( 'errors', $validator->messages() );
        }

        $hash = '14Thsg$!Wxyy&Q';
        $db = [
            'login' => 'allan',
            'senha' => sha1( $hash . '123456' )
        ];

        if ( $request->input( 'cilogin' ) === $db['login'] && sha1( $hash . $request->input('cisenha') ) === $db['senha'] ) {
            $user = [
                'nivel'  => 1,
                'logged' => TRUE
            ];
            session([ 'user' => $user ]);

            return redirect()->route( 'painel.usuarios.index' )->with( 'messages', 'Usuário logado.' );
        } else {
            session()->forget('user');

            return redirect()->route( 'painel.usuarios.login' )->with([ 'messages' => 'Usuário e/ou senha inválido.', 'type' => 'danger' ]);
        }
    }

    public function sair()
    {
        session()->forget('user');

        return redirect()->route( 'painel.usuarios.login' )->with([ 'messages' => 'Logout efetuado com sucesso.', 'type' => 'danger' ]);
    }
}
