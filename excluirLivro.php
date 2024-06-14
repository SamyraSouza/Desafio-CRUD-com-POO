<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Livro;
use \App\Entity\AutorLivro;

$livros = Livro::getLivro();
$autorlivro = AutorLivro::getAutorLivro();

define('PG', 'Livros');

if(!isset($_GET['ISBN'])){
    header('location: listagemLivros.php?status=error');
    exit;
}

$obLivro= Livro::getLivros($_GET['ISBN']);
$obAutorLivro= AutorLivro::getAutL($_GET['ISBN']);


if(!$obLivro instanceof Livro and !$obAutorLivro instanceof AutorLivro){
    header('location: listagemLivros.php?status=error');
    exit;
}

if(isset($_POST['excluirLivro'])){

    $obAutorLivro->excluirAutorLivro();
    $obLivro->excluirLivro();

    header('location: listagemLivros.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/exclusaoLivro.php';
include __DIR__ . '/includes/footer.php';