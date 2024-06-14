<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5">Devolver Livro</h1>

<main> 
  
<form method="post" class="mt-3">
    <div class="col-md-6">

    <p>Você deseja realmente marcar o livro <strong><?=$obEmprestimo->titulo?></strong> de ISBN <strong><?=$obEmprestimo->ISBN?></strong> do leitor <strong><?=$obEmprestimo->Nome?></strong> como devolvido?</p>

      <div class="input-group input-group-outline my-3">
       
      </div>
    </div>

    <a href="listagemEmprestimo.php">
    <button type="button" class="btn btn-icon btn-2 btn-success mt-3">Cancelar</button>
  </a>

    <button type="submit" name="excluirEmprestimo" class="btn btn-icon btn-2 btn-warning mt-3">Devolver</button>

</form>
</main>