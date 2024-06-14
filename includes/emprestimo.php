<?php 

    $resultadosemprestimos='';
    foreach($emprestimos as $emp){
        $resultadosemprestimos .= ' <tr>  
        <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($emp->dataEmpre)).'</td>
        <td class="align-middle text-center text-sm">'.$emp->idE.'</td>
                        </tr>';
    }

?>

<main>
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