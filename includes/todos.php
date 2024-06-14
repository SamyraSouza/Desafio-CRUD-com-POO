<?php 


    $resultados=''; 

    foreach($autorlivro as $liv){

    $isbn="'".$liv->ISBN."'";


        $resultados .= ' <tr>  

        <td class="align-middle text-center text-sm">'.$liv->ISBN.'</td>
        <td class="align-middle text-center text-sm">'.$liv->titulo.'</td>
        <td class="align-middle text-center text-sm">'.$liv->Nomes.'</td>
        <td class="align-middle text-center text-sm">'.number_format($liv->preco,2,",",".").'</td>
        <td class="align-middle text-center text-sm">'.date('d/m/Y', strtotime($liv->dataPubli)).'</td>
     

        <td class="align-middle text-center text-sm">'.$liv->Nome.'</td>


                        </tr>

                        ';
    }
    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center">Nenhum livro encontrado</td><tr>';

    $resultadosautores='';
    foreach($autores as $autor){
        $resultadosautores .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$autor->Nome.'</td>
        <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($autor->DataNasc)).'</td>
        <td class="align-middle text-center text-sm">'.$autor->Biografia.'</td>


                        </tr>';
    }

    $resultadosautores = strlen($resultadosautores) ? $resultadosautores : '<tr><td colspan="3" class="text-center">Nenhum autor encontrado</td><tr>';

    $resultadoscategorias='';
    foreach($categorias as $cat){
        $resultadoscategorias .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cat->Nomes.'</td>


                        </tr>';
    }

    $resultadoscategorias = strlen($resultadoscategorias) ? $resultadoscategorias : '<tr><td colspan="2" class="text-center">Nenhuma categoria encontrada</td><tr>';

    $resultadoscategorias='';
    foreach($categorias as $cat){
        $resultadoscategorias .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cat->Nomes.'</td>


                        </tr>';
    }

    $resultadoscategorias = strlen($resultadoscategorias) ? $resultadoscategorias : '<tr><td colspan="2" class="text-center">Nenhuma categoria encontrada</td><tr>';

    $resultadosemprestimos='';
    foreach($emprestimos as $emp){
        $resultadosemprestimos .= ' <tr>  
        <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($emp->dataEmpre)).'</td>
        <td class="align-middle text-center text-sm">'.$emp->idE.'</td>
                        </tr>';
    }

?>

<main>
<h2 class="mt-3 text-right mb-3">Livros</h2>
<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Título</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Categoria</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Preço (R$)</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Data de Publicação</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Autor</th>
          
        </tr>
      </thead>

      <tbody>
        
        <?=$resultados?>
        
    </tbody>

        </table>
   </div>
</div>

<h2 class="mt-5 text-right mb-3">Autores</h2>
<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Nascimento</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Biografia</th>

        </tr>
      </thead>

      <tbody>
        <?=$resultadosautores?>
    </tbody>


        </table>
    </div>
</div>

<h2 class="mt-5 text-right mb-3">Categorias</h2>
<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
          
        </tr>
      </thead>

      <tbody>
        <?=$resultadoscategorias?>
    </tbody>


        </table>
    </div>
</div>

<h2 class="mt-5 text-right mb-3">Empréstimos Por Período</h2>

<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Número de Empréstimos</th>
          
        </tr>
      </thead>

      <tbody>
        <?=$resultadosemprestimos?>
    </tbody>


        </table>
    </div>
</div>

  </main>