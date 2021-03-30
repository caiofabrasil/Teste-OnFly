
@extends('templates.template')
		
@section('conteudo')<!-- View para a pagina principal das Despesas-->
	<h1 class="text-center mb-5 mt-1"> Despesas </h1>


	<h5 class="ml-3"> {{$_SESSION['usuario'] . ' Despesas :'}} </h5>

	<table class="table text-center">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Descrição</th>
		  <th scope="col">Data</th>
		  <th scope="col">valor</th>
		  <th scope="col"> ------ </th>
	    </tr>
	  </thead>
		<!-- Loop entre todas as Despesas do usuario para mostrar -->
		<tbody class="table text-center">
		@foreach($Despesas as $Despesas)
			<tr>
			<th scope="row">{{$Despesas->id}}</th>
			<td>{{$Despesas->descricao}}</td>
				<?php
					$data = substr (strval($Despesas->created_at) , 0 , 10 );
				?>
     		 <td>{{$data}}</td> 
			<td>{{$Despesas->valor}}</td>

				<td> 
				
					<a href="{{ url("Despesas/$Despesas->id") }}"><button class="btn btn-dark">Detalhes</button></a> 

					<a href="{{url("Despesas/$Despesas->id/edit")}}"><button class="btn btn-info">Editar</button></a>

					<a href="{{ url("/Despesas/$Despesas->id/delete") }}"><button class="btn btn-danger">Remover</button></a> 

				</td>

			</tr>

		@endforeach

		</tbody>
	  
	</table>

	<!-- Botão de Inserir Despesas-->
	<div class= "m-5" >

	<div class="text-center m-5"> 
		<a href=" {{url("Despesas/create")}}">
			<button class=" btn btn-success text-center"> Inserir </button>
		</a>
	</div>

	
		</div> <!-- Botão de Log Out -->

		<a href=" {{url('LogOut')}} " class="position-absolute fixed-bottom text-center m-5" > <button class="btn btn-danger"> Log Out </button> </a>

@endsection
	