<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Livro;
use \App\Entity\Categoria;
use \App\Entity\Autor;
use \App\Entity\AutorLivro;

define('TITLE', 'Editar Livro');
define('PG', 'Livros');



if(!isset($_GET['ISBN'])){
    header('location: listagemLivros.php?status=error');
    exit;
}

$obLivro= Livro::getLivr($_GET['ISBN']);
$obAutorLivro= AutorLivro::getAutL($_GET['ISBN']);

$categorias = Categoria::getCategoria();
$autores = Autor::getAutor();
$autorlivro = AutorLivro::getAutorLivro();

if(!$obLivro instanceof Livro){
    header('location: listagemLivros.php?status=error');
    exit;
}

if(isset($_POST['ISBN'],$_POST['titulo'],$_POST['idCategoria'],$_POST['preco'],$_POST['dataPubli'], $_POST['idAutor'] )){


    $obLivro->ISBN = $_POST['ISBN'];   
    $obLivro->titulo = $_POST['titulo']; 
    $obLivro->idCategoria = $_POST['idCategoria']; 
    $obLivro->preco = $_POST['preco']; 
    $obLivro->dataPubli = $_POST['dataPubli']; 


    $obAutorLivro->idAutor = $_POST['idAutor']; 
    $obAutorLivro->ISBN_livro = $_POST['ISBN'];


    $obAutorLivro->atualizarAL();
    $obLivro->atualizar();


    header('location: listagemLivros.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulariolivros.php';
include __DIR__ . '/includes/footer.php';