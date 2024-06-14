
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
    foreach($categorias as $cat){
        $resultados .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cat->Nomes.'</td>

        <td class="align-middle text-center text-sm">

        <a href="editarCategoria.php?id='.$cat->id.'"><button type="button" class="btn btn-info">Editar</button>
        
        <a href="excluirCategorias.php?id='.$cat->id.'"><button type="button" class="btn btn-danger">Excluir</button>
        </td>

                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="2" class="text-center">Nenhuma categoria encontrada</td><tr>';

?>


<h1 class="mt-5 text-center mb-3">Categorias</h1>
<main>

<?=$mensagem?>

<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Ações</th>
          
        </tr>
      </thead>

      <tbody>
        <?=$resultados?>
    </tbody>


        </table>
    </div>
</div>

<section>
    <a href='cadastrarCategorias.php'>
        <button class="btn btn-success mt-5">Cadastrar</button>
    </a>
</section>
</main>