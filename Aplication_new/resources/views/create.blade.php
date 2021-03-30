
@extends('templates.template')
		
@section('conteudo') <!-- View para o formulario de Criação e Edição de Despesas -->

	<h1 class=" text-center "> @if(isset($Despesas))Editar @else Cadastrar @endif Despesa </h1>

	<div class="col-8 m-auto">


    @if(isset($Despesas))
        <form name="formEdit" id="formEdit" method="post" enctype="multipart/form-data" action="{{url("Despesas/$Despesas->id")}}">
            @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" enctype="multipart/form-data" action="{{url('Despesas')}}">
    @endif
            @csrf
            <!-- Input de Descrição da Despesa-->
			<input class="form-control" type="text" name="Descricao_Input" id="Descricao_Input"  placeholder=" Descrição da Despesa" value="{{$Despesas->descricao ?? ''}}">
            <span class="text-danger">
            <!-- Mensagem de erro -->
				@if($errors->has('Descricao_Input'))
					<br>
					{{$errors->first('Descricao_Input')}}
				@endif
			</span> <br>
            <!-- Input de Valor da Despesa-->
            <input class="form-control" type="number" name="Despesa_Valor_Input" id="Despesa_Valor_Input" placeholder="Valor" value="{{$Despesas->valor ?? ''}}">
            <span class="text-danger">
            <!-- Mensagem de erro -->
				@if($errors->has('Despesa_Valor_Input'))
					<br>
					{{$errors->first('Despesa_Valor_Input')}}
				@endif
			</span> <br>
            <!-- Input de nome da imagem da Despesa-->
            <input type="text" name="nameImg" placeholder="Nome do Arquivo" value="{{$Despesas->arquivoImg ?? ''}}"> 
            <span class="text-danger">
            <!-- Mensagem de erro -->
				@if($errors->has('nameImg'))
					<br>
					{{$errors->first('nameImg')}}
				@endif
			</span>
            <!-- Input de Imagem da Despesa-->
            <input type="file" name="imagem" > <br>
            <span class="text-danger">
                <!-- Mensagem de erro -->
				@if($errors->has('imagem'))
					<br>
					{{$errors->first('imagem')}}
				@endif
			</span>
			<input class="btn btn-success text-center m-3" type="submit" name="Inserir">
		</form>

	</div>

    <br>
	<!-- Botão de voltar -->
	<div class="text-center  position-absolute fixed-bottom m-5">
		<a href="{{url("Despesas")}} ">
			<button class="btn btn-success"> Voltar </button>
		</a>
	</div>  
	

@endsection
	