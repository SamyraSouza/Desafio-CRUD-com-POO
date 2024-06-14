<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Emprestimo;
use \App\Entity\Livro;
use \App\Entity\Cliente;



define('TITLE', 'Editar Empréstimo');
define('PG', 'Emprestimo');

if(!isset($_GET['idE']) or !is_numeric($_GET['idE'])){
    header('location: listagemEmprestimo.php?status=error');
    exit;
}

$obEmprestimo= Emprestimo::getEmpre($_GET['idE']);


$livros = Livro::getLivro();
$clientes = Cliente::getCliente();

if(!$obEmprestimo instanceof Emprestimo){
    header('location: listagemEmprestimo.php?status=error');
    exit;
}

if(isset($_POST['dataEmpre'],$_POST['dataDevo'],$_POST['idCliente'],$_POST['ISBN_liv'])){
    
    $obEmprestimo->dataDevo = $_POST['dataDevo'];

    $obEmprestimo->atualizar();
    

    header('location: listagemEmprestimo.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/editar.php';
include __DIR__ . '/includes/footer.php';
?>
