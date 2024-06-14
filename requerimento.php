<?php 
    define('PG', 'Requerimentos');
    include __DIR__ . '/includes/header.php';
?>
<h1 class="mt-5 text-center mb-3">Requerimentos</h1>
<main>

<div class="card">
  <div class="table-responsive">
        <table class="table align-items-center mb-0 mt-3">

        <thead>
        <tr>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leitor</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contato</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>

          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>

          <th class="text-center text-uppercase text-center text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
      </thead>

    <tbody id="requerimentos">
    <td colspan="5" class="text-center" id="nenhum"> Nenhum requerimento encontrado</td>
    </tbody>


        </table>
    </div>
</div>

</main>

<script src="includes/js/adm.js"></script>

<script src="includes/js/reque.js"></script>


</body>

</html>