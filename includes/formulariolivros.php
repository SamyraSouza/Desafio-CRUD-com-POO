<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5"><?=TITLE?></h1>

<main>

<?php 
$cate='';
foreach($categorias as $cat){

  if($cat->id == $obLivro->idCategoria){
    $cate .= ' 
    <option value="'.$cat->id.'" selected name="" class="align-middle text-center text-sm">'.$cat->Nomes.'</option>';
  }

  else{
     $cate .= ' 
    <option value="'.$cat->id.'" name="" class="align-middle text-center text-sm">'.$cat->Nomes.'</option>';
  }
   
}

$cate = strlen($cate) ? $cate : '<option class="align-middle text-center text-sm">Nenhuma categoria encontrada</option>';


$auto='';
foreach($autores as $aut){

if($aut->id == $obAutorLivro->idAutor){
    $auto .= ' 
    <option value="'.$aut->id.'" selected name="" class="align-middle text-center text-sm">'.$aut->Nome.'</option>';
  }

  else{
     $auto .= ' 
    <option value="'.$aut->id.'" name="" class="align-middle text-center text-sm">'.$aut->Nome.'</option>';
  }
   
}

$auto = strlen($auto) ? $auto : '<option class="align-middle text-center text-sm">Nenhum autor encontrado</option>';
?>


<form method="post" class="mt-3">

  <p>ISBN</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control" name="ISBN" value="<?=$obLivro->ISBN?>">
      </div>
    </div>

    <p>Título</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control" name="titulo" value="<?=$obLivro->titulo?>">
      </div>
    </div>

    <p>Categoria</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
      <select style="border:1px solid lightgray; border-radius: 20px; color: gray; margin-right:10px;" name="idCategoria" id="">
        <option  value="">Selecione uma categoria</option>
      <?=$cate?>
      </select>    
      </div>  
  
    </div>
  

    <p>Preço</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <input type="number" step="0.01" class="form-control" name="preco" value="<?=$obLivro->preco?>">
      </div>
    </div>

    <div class="col-md-6">
      <p>Data de Publicação</p>
      <div class="input-group input-group-outline my-3">
        <input type="date" class="form-control" name="dataPubli" value="<?=$obLivro->dataPubli?>">
      </div>
    </div>

<p>Autor</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
      <select style="border:1px solid lightgray; border-radius: 20px; color: gray; margin-right:10px;" name="idAutor" id="">
        <option  value="">Selecione um autor</option>
      <?=$auto?>
      </select>
      </div>
    </div>


 <a href='listagemLivros.php'>
        <button type="button" class="btn btn-icon btn-2 btn-primary mt-3">Voltar</button>
    </a>

<button type="submit" class="btn btn-icon btn-2 btn-success mt-3">Enviar</button>


</form>


</main>