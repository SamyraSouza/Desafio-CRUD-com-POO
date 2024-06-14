<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5"><?=TITLE?></h1>

<main> 

<?php 
$livro='';

foreach($livros as $liv){

  if($liv->ISBN == $obEmprestimo->ISBN_liv){
    $livro .= ' 
    <option value="'.$liv->ISBN.'" selected name="" class="align-middle text-center text-sm">'.$liv->ISBN.' - '.$liv->titulo.'</option>';
  }

  else{
     $livro .= ' 
    <option value="'.$liv->ISBN.'" name="" class="align-middle text-center text-sm">'.$liv->ISBN.' - '.$liv->titulo.'</option>';
  }
}

$livro = strlen($livro) ? $livro : '<option class="align-middle text-center text-sm">Nenhum livro encontrado</option>';


$cliente='';
foreach($clientes as $cli){

if($cli->id == $obEmprestimo->idCliente){
    $cliente .= ' 
    <option value="'.$cli->id.'" selected name="" class="align-middle text-center text-sm">'.$cli->Nome.' - '.$cli->Contato.'</option>';
  }

  else{
     $cliente .= ' 
    <option value="'.$cli->id.'" name="" class="align-middle text-center text-sm">'.$cli->Nome.' - '.$cli->Contato.'</option>';
  }
   
}

$cliente = strlen($cliente) ? $cliente : '<option class="align-middle text-center text-sm">Nenhum leitor encontrado</option>';
?>

<form method="post" class="mt-3">

    <div id="empre" class="col-md-6">
    <p>Data Empréstimo</p>
      <div class="input-group input-group-outline my-3">
        <input type="date" id="empre" class="form-control" name="dataEmpre" value="<?=$obEmprestimo->dataEmpre?>">
      </div>
    </div>

    <div class="col-md-6">
    <p>Data Devolução</p>
      <div class="input-group input-group-outline my-3">
        <input type="date" id="devo" class="form-control" name="dataDevo" value="<?=$obEmprestimo->dataDevo?>">
      </div>
    </div>
  
    <p id="cliente">Leitor</p>
  <div id="cliente" class="col-md-6">
      <div class="input-group input-group-outline my-3">
      <select id="sele" style="border:1px solid lightgray; border-radius: 20px; color: gray; margin-right:10px;" name="idCliente" id="">
        <option  value="">Selecione um leitor</option>
      <?=$cliente?>
      </select>    
      </div>  
    </div>

    <p id="livro">Livro</p>
    <div id="livro" class="col-md-6">
      <div class="input-group input-group-outline my-3">
      <select id="sele1" style="border:1px solid lightgray; border-radius: 20px; color: gray; margin-right:10px;" name="ISBN_liv" id="">
        <option  value="">Selecione um livro</option>
      <?=$livro?>
      </select>    
      </div>  
    </div>

    <a href='listagemEmprestimo.php'>
        <button type="button" class="btn btn-icon btn-2 btn-primary mt-3">Voltar</button>
    </a>
    <button type="submit" class="btn btn-icon btn-2 btn-success mt-3">Enviar</button>

    <script src="includes/js/devol.js" ></script>
</form>
</main>