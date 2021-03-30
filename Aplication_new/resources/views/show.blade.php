@extends('templates.template')

@section('conteudo')<!-- View de Detalhes de Despesas -->
<h1 class= "text-center display-4" >Despesa info</h1> <hr>

<div class="col-8 m-auto">

    {{--$Despesas--}}

    <table class="table">

  <thead> <!-- Tabela de Despesas -->
    <tr>
      <th scope="col">--</th>
      <th scope="col">Usuario</th>
      <th scope="col">Descrição</th>
      <th scope="col">Imagem</th>
      <th scope="col">Valor</th>
      <th scope="col">Data</th>
    </tr>
  </thead>

  <tbody> <!-- Corpo Da tabela Despesas-->
    <tr>
      <th scope="row">--</th>
      <td>{{$_SESSION['usuario']}}</td> 
      <td>{{$Despesas->descricao}}</td>
      <td> <img src="{{url("storage/products/{$Despesas->arquivoImg}")}}" class="w-50" >  </td> 
      <td>{{$Despesas->valor}}</td> 
      <?php
        $data = substr (strval($Despesas->created_at) , 0 , 10 );
      ?>
      <td>{{$data}}</td> 
    </tr>
  </tbody>

</table>
</div>

<div class="text-center  position-absolute fixed-bottom m-5"> <!-- Botão de Voltar-->
		<a href="{{url("Despesas")}} ">
			<button class="btn btn-success"> Voltar </button>
		</a>
	</div>  

@endsection