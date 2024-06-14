<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Autor;

define('TITLE', 'Cadastar Autor');
define('PG', 'Autores');
// echo"<pre>";print_r($_POST); echo"</pre>";exit;

 $obAutor = new Autor;

if(isset($_POST['Nome'],$_POST['DataNasc'],$_POST['Biografia'])){
   
    $obAutor->Nome = $_POST['Nome'];   
    $obAutor->DataNasc = $_POST['DataNasc'];
    $obAutor->Biografia = $_POST['Biografia'];

    $obAutor->cadastrar();
    

    header('location: listagemAutores.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioautores.php';
include __DIR__ . '/includes/footer.php';