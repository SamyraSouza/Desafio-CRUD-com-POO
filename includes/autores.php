<?php 


$resultadosautores='';
foreach($autores as $autor){
    $resultadosautores .= ' <tr>  
    <td class="align-middle text-center text-sm">'.$autor->Nome.'</td>
    <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($autor->DataNasc)).'</td>
    <td class="align-middle text-center text-sm">'.$autor->Biografia.'</td>


                    </tr>';
}

$resultadosautores = strlen($resultadosautores) ? $resultadosautores : '<tr><td colspan="3" class="text-center">Nenhum autor encontrado</td><tr>';


?>

<main>

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
        
        <?=$resultadosautores?>
        
    </tbody>

        </table>
   </div>
</div>
  </main>