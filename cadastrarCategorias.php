<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Categoria;


define('TITLE', 'Cadastar Categoria');
define('PG', 'Categorias');
// echo"<pre>";print_r($_POST); echo"</pre>";exit;

$obCategoria = new Categoria;

if(isset($_POST['Nomes'])){
   
    $obCategoria->Nomes = $_POST['Nomes'];   
 
    $obCategoria->cadastrar();
    

    header('location: listagemCategorias.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulariocategorias.php';
include __DIR__ . '/includes/footer.php';