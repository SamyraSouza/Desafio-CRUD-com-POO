<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Livro;
use \App\Entity\Categoria;
use \App\Entity\Autor;
use \App\Entity\AutorLivro;


define('TITLE', 'Cadastar Livro');
define('PG', 'Livros');

$obLivro = new Livro;
$obAutorLivro = new AutorLivro;


$livros = Livro::getLivro();
$autorlivro = AutorLivro::getAutorLivro();
$categorias = Categoria::getCategoria();
$autores = Autor::getAutor();



if(isset($_POST['ISBN'],$_POST['titulo'],$_POST['idCategoria'],$_POST['preco'],$_POST['dataPubli'],$_POST['idAutor'] )){
   
    $obLivro->ISBN = $_POST['ISBN'];   
    $obLivro->titulo = $_POST['titulo']; 
    $obLivro->idCategoria = $_POST['idCategoria']; 
    $obLivro->preco = $_POST['preco']; 
    $obLivro->dataPubli = $_POST['dataPubli']; 

   
    $obAutorLivro->ISBN_livro = $_POST['ISBN'];   
    $obAutorLivro->idAutor = $_POST['idAutor']; 


    $obLivro->cadastrar();
    $obAutorLivro->cadastrarAL();

    header('location: listagemLivros.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulariolivros.php';
include __DIR__ . '/includes/footer.php';