<?php

namespace App\Http\Controllers;

use App\Models\Despesas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ModelUser;

class UsuarioController extends Controller
{
    
    public function index(Request $request)
    {     
        $erro = '';

        if($request->is('Login\*')){
            $erro = 'Usuario e/ou Senha não existe';
        }

        return view('index', ['erro' => $erro]);
    }

    public function Registrar(Request $request){
         
         $usuario = new ModelUser();
         $usuario->usuario = $request->input('usuario');
         $usuario->senha = md5($request->input('senha'));
 
         $request->validate([
             'usuario' =>'required|min:3|max:40',
             'senha' => 'required|min:4'
         ]);
 
         $usuarioR = $request->get('usuario');
         
         $user = new ModelUser();
         $usuario = $user->where('usuario', $usuarioR)->get(); 
         $usuario = $usuario->first();
 
 
         if(isset($usuario->usuario)){

             $erro = 'Usuario existente';
             return view('index', ['erro' => $erro]);
         }
         else{

            $registro = new ModelUser();
            $registro->usuario = $request->input('usuario');
            $registro->senha = md5($request->input('senha'));
            $registro->save(); 
            $erro = 'Novo Usuario Cadastrado com Sucesso';
            return view('index', ['erro' => $erro]);
         }
    }


    public function Login(Request $request){

        //Login
        $usuario = new ModelUser();
        $usuario->usuario = $request->input('usuario');
        $usuario->senha = md5($request->input('senha'));

        $request->validate([
            'usuario' =>'required|min:3|max:40',
            'senha' => 'required|min:4'
        ]);

        
        //parametros recuperados do usuario
        $usuarioR = $request->get('usuario');
        $senhaR =  md5($request->input('senha'));
        
        
        //iniciando o ModelUser
        $user = new ModelUser();
        $usuario = $user->where('usuario', $usuarioR)->where('senha', $senhaR)->get(); //retorna uma coleção de registros
        $usuario = $usuario->first();

        if(isset($usuario->usuario)){
            //dd($usuario);
            session_start();
            $_SESSION['usuario'] = $usuario->usuario;
            $_SESSION['senha'] = $usuario->senha;
            $_SESSION['id'] = $usuario->id;

            //dd($_SESSION);
        

            return redirect('/Despesas');
        }
        else{

            $erro = 'Usuario e/ ou senha incorretos';
            return view('index', ['erro' => $erro]);
        }
    }

    public function LogOut(Request $request)
    {
        session_start();

        session_destroy();
        return redirect()->route('resources.views.index');
    }

    public function First(){
        return view('index');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
