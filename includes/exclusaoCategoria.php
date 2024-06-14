<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5">Excluir Categoria</h1>

<main> 
  
<form method="post" class="mt-3">
    <div class="col-md-6">

    <p>Você deseja realmente excluir a categoria <strong><?=$obCategoria->Nomes?></strong>?</p>

      <div class="input-group input-group-outline my-3">
       
      </div>
    </div>

    <a href="listagemCategorias.php">
    <button type="button" class="btn btn-icon btn-2 btn-success mt-3">Cancelar</button>
  </a>

    <button type="submit" name="excluirCategoria" class="btn btn-icon btn-2 btn-danger mt-3">Excluir</button>

</form>
</main>