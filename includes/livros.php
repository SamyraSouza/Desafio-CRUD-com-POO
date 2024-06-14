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
?>

<main>
<h2 class="mt-5 text-right mb-3">Livros</h2>
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
  </main>