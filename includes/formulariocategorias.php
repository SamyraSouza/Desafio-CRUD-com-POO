<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5"><?=TITLE?></h1>

<main>

<form method="post" class="mt-3">

  <p>Nome</p>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control" name="Nomes" value="<?=$obCategoria->Nomes?>">
      </div>
    </div>
    
    <a href='listagemCategorias.php'>
        <button type="button" class="btn btn-icon btn-2 btn-primary mt-3">Voltar</button>
    </a>

    <button type="submit" class="btn btn-icon btn-2 btn-success mt-3">Enviar</button>

    
</form>

</main>
</div>
</div>
</div>
</div>