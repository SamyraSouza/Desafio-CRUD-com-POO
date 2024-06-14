<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Emprestimo;
define('PG', 'Emprestimos');

if(!isset($_GET['idE']) or !is_numeric($_GET['idE'])){
    header('location: listagemEmprestimo.php?status=error');
    exit;
}

$obEmprestimo= Emprestimo::getEmpre($_GET['idE']);

if(!$obEmprestimo instanceof Emprestimo){
    header('location: listagemEmprestimo.php?status=error');
    exit;
}


if(isset($_POST['excluirEmprestimo'])){

    $obEmprestimo->excluirEmprestimo();

    header('location: listagemEmprestimo.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/exclusaoEmprestimo.php';
include __DIR__ . '/includes/footer.php';