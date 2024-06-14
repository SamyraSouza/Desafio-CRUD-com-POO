<?php 

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success text-white" role="alert"> Ação executada com
                <strong>sucesso!</strong> </div>';
                break;

                case 'error':
                    $mensagem = '<div class="alert alert-danger text-white" role="alert">Ação <strong>não</strong> executada!</div>';
                    break;
        }
    }

    $resultados='';
    foreach($emprestimo as $emp){
        
        $resultados .= ' <tr>   
        <td rowspan="" class="align-middle text-center text-sm">'.$emp->Nome.'</td>
        <td rowspan="" class="align-middle text-center text-sm">'.$emp->Contato.'</td>
        <td class="align-middle text-center text-sm">'.$emp->ISBN.'</td>
        <td class="align-middle text-center text-sm">'.$emp->titulo.'</td>     
        <td class="align-middle text-center text-sm">'.date('d/m/Y', strtotime($emp->dataEmpre)).'</td>
        <td class="align-middle text-center text-sm">'.date('d/m/Y', strtotime($emp->dataDevo)).'</td>
       
        <td class="align-middle text-center text-sm">

        <a href="editarEmprestimo.php?idE='.$emp->idE.'"><button onclick="devolver()" type="button" class="btn btn-info">Editar Devolução</button>

        <a href="excluirEmprestimo.php?idE='.$emp->idE.'"><button type="button" class="btn btn-warning">Devolver</button>
        </td>

                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="7" class="text-center">Nenhum empréstimo encontrado</td><tr>';
?>
<h1 class="mt-5 text-center mb-3">Empréstimos</h1>
<main>

<?=$mensagem?>

<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leitor</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contato</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Livro</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Data Empréstimo</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Data Devolução</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Ação</th>
        </tr>
      </thead>

      <tbody>
        <?=$resultados?>
    </tbody>


        </table>
    </div>
</div>

<section>
    <a href='cadastrarEmprestimo.php'>
        <button class="btn btn-success mt-5">Cadastrar</button>
    </a>
</section>
</main>