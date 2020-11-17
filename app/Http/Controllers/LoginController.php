<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function telaLogin()
    {
    
    //Maneira que fiz para inserir login e senha (tentei a senha de forma criptografada 
   //com Hash::make() mas não logava... Então deixei sem)

      $user = new User();
      $user->usuario = 'admin';
      $user->password = 'admin';
      $user->save(); 

        $user = User::where('id', '=', 1)->first();
        return view('telaLogin', [
            'user' => $user
        ]);
    }

    public function checaLogin(Request $request)
    {
        $usuario = $request->only('usuario');
        $senha = $request->only('password');

        $user = User::where('usuario', $usuario)->first();

        //dd($user);

        if ($user) // encontrou o usuário
        {
            if ($usuario['usuario'] === $user['usuario'] && $senha['password'] === $user['password']){ // conferindo senha
                
                Auth::login($user); // autentica o usuário

                return view('telaInicio');

            } else {
                return back()->with('error', 'Login ou senha incorretos');
            }   
        }
    }

    function sucessoLogin()
    {
        return view('telaInicio');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
