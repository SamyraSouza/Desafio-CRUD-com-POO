<div class="row">
  <div class="col-md-20 mb-5">
    <div class="card shadow-lg">
    <div class="card-body text-lg-start text-center pt-0">

      <h1 class="mt-5"><?=TITLE?></h1>

<main> 
  

<form method="post" class="mt-3">

    <div class="col-md-6">
    <p>Nome</p>
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control" name="Nome" value="<?=$obCliente->Nome?>">
      </div>
    </div>

    
    <div class="col-md-6">
      <p>Contato</p>
      <div class="input-group input-group-outline my-3">
      <input type="text" class="form-control" name="Contato" value="<?=$obCliente->Contato?>">
      </div>
    </div>
  

    <a href='listagemClientes.php'>
        <button type="button" class="btn btn-icon btn-2 btn-primary mt-3">Voltar</button>
    </a>
    <button type="submit" class="btn btn-icon btn-2 btn-success mt-3">Enviar</button>

</form>
</main>