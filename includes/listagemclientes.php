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
    foreach($clientes as $cli){
        $resultados .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cli->Nome.'</td>
        <td class="align-middle text-center text-sm">'.$cli->Contato.'</td>
       
        <td class="align-middle text-center text-sm">

        <a href="editarClientes.php?id='.$cli->id.'"><button type="button" class="btn btn-info">Editar</button>

        <a href="excluirClientes.php?id='.$cli->id.'"><button type="button" class="btn btn-danger">Excluir</button>
        </td>

                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="3" class="text-center">Nenhum leitor encontrado</td><tr>';
?>
<h1 class="mt-5 text-center mb-3">Leitores</h1>
<main>

<?=$mensagem?>

<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contato</th>

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
    <a href='cadastrarClientes.php'>
        <button class="btn btn-success mt-5">Cadastrar</button>
    </a>
</section>
</main>