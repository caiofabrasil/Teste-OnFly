<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;
use App\Models\ModelUser;
use Illuminate\Support\Str;

class DespesasController extends Controller
{

    private $userT;
    private $despesasT;

    public function __construct()
    {
        $this->userT= new ModelUser();
        $this->despesasT= new Despesas();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //session_start();
        $user = $_SESSION['id'];
        
        //dd($_SESSION);
        //dd($this->userT->find(1)->relDespesas);
        $user = session('id') ;
        $Despesas =  $this->despesasT->where(['despesas_id' => $_SESSION['id'] ])->get(); //colocar aqui o ID do ususario  $_SESSION["usuario"]
        return view('despesas', compact('Despesas', 'user'));
        //
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->userT;
        return view('create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //session_start();
        /* //['descricao', 'data', 'arquivoImg', 'valor', 'despesas_id'];

        $Despesa = new Despesas();
        $Despesa->descricao = $request->input('Descricao_Input');
        //data ?
        $Despesa->arquivoImg = $request->input('Despesa_Imagem_Input');
        $Despesa->valor = $request->input('Despesa_Valor_Input');
        $Despesa->despesas_id = $this->userT->get('id');

        $request->validate([
            'descricao' =>'required',
            'arquivoImg' =>'required',
            'valor' =>'required'      
        ]);

        $Despesa->save();

        return redirect('Despesas'); */
        $despesa = new Despesas();
        $despesa->descricao = $request->input('Descricao_Input');
        $despesa->valor = $request->input('Despesa_Valor_Input');

        $valid = $request->validate([
            'Descricao_Input' =>'required|min:3|max:60',
            'Despesa_Valor_Input' => 'required|min:4|numeric',
            'nameImg' => 'required',
            'imagem' => 'required'
        ]);
        
        if($request->file('imagem')->isValid())
        {
            $nameFile = $request->nameImg;
            $nameFile = Str::of($nameFile)->slug('-') . '.' . $request->imagem->extension();
            $request->file('imagem')->storeAs('products', $nameFile);
        }

        
            
        
         if($valid) 
         {  
        $cad = $this->despesasT
         ->create([
            'descricao' => $request-> Descricao_Input,
            //'data' => $request-> Despesa_Data_Input,
            'arquivoImg' => $nameFile,
            'valor' => $request-> Despesa_Valor_Input,
            'despesas_id' => $_SESSION['id']
            ]);
         }
        if($cad)
        {
            return redirect('Despesas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Despesas = $this->despesasT-> find($id); 
        return view('show', compact('Despesas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Despesas=$this->despesasT->find($id);
        $user=$this->userT;
        return view('create', compact('Despesas', 'user'));
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
        $valid = $request->validate([
            'Descricao_Input' =>'required|min:3|max:60',
            'Despesa_Valor_Input' => 'required|min:4|numeric',
            'nameImg' => 'required',
            'imagem' => 'required'
        ]);
        

        if($request->file('imagem')->isValid())
        {
            $nameFile = $request->nameImg;
            $nameFile = Str::of($nameFile)->slug('-') . '.' . $request->imagem->extension();
            $request->file('imagem')->storeAs('products', $nameFile);
        }
            
        if($valid){
            $this->despesasT->where(['id' => $id])->update([
                'descricao' => $request-> Descricao_Input,
                'arquivoImg' => $nameFile ,
                'valor' => $request-> Despesa_Valor_Input
                
            ]);

            return redirect('Despesas');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesas::find($id)->delete();
        return redirect('Despesas');
        
    }
}
