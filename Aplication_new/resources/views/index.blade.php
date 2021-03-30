
@extends('templates.template')
		
@section('conteudo')<!-- View de Login e Registrar-->
	<h1 class="text-center"> @if(isset($registrar)) Registrar @else Login @endif  </h1>

<div class="text-center m-5">

	 @if(isset($registrar))
        <form name="formRegistrar" id="formRegistrar" method="post" action=#>
    @else
       <form name="formLogin" id="formLogin" method="post" action="{{url("Login")}}">
    @endif
		@csrf

		<!-- Espaço de usuario -->
		Usuario:

		<input  class=" m-2 type="text"  name="usuario" value = " {{ old('usuario')}} ">
			<span class="text-danger">
				@if($errors->has('usuario'))
					<br>
					{{$errors->first('usuario')}}
				@endif
			</span>
		<br>

		<!-- Espaço de senha -->
		<span class="mr-2"> Senha: </span>
		   
		<input class="ml-2" type="password" name="senha">	<br>
		<span class="text-danger m-0">
				@if($errors->has('senha'))
					<br>
					{{$errors->first('senha')}}
					<br>
				@endif
			</span>

		<input class="btn btn-success mt-2" type="submit" name="Submit">

	</form>


	<!-- Botão de ir para a pagina de Registrar/ Login -->
	<a href=" @if(isset($registrar)) {{url("Login")}} @else {{url("Registrar")}} @endif " class="text-center mt-4"> @if(isset($registrar)) Login @else Registrar @endif </a>

	<!-- Impressão de Erros na Parte de Usuario -->
	<br>
	<span class="text-danger"> 
	{{isset($erro) && $erro != '' ? $erro : '' }}
	 </span>
	


@endsection
	