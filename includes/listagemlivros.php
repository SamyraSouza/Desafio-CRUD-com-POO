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


    $msg = '';

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

        <td class="align-middle text-center text-sm">

        <a href="editarLivro.php?ISBN= '.$isbn.'"><button type="button" class="btn btn-info">Editar</button>

        <a href="excluirLivro.php?ISBN= '.$isbn.'"><button type="button" onclick="" class="btn btn-danger">Excluir</button>
        
        </td>

                        </tr>

                        ';
    }
    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="7" class="text-center">Nenhum livro encontrado</td><tr>';

?>

<h1 class="mt-5 text-center mb-3">Livros</h1>
<main>

<?=$mensagem?>

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
    <a href='cadastrarLivros.php'>
        <button class="btn btn-success mt-5">Cadastrar</button>
    </a>
</section>
</main>