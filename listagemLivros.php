<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Livro;
use \App\Entity\Categoria;
use \App\Entity\Autor;
use \App\Entity\AutorLivro;

define('PG', 'Livros');

$livros = Livro::getLivro();
$categorias = Categoria::getCategoria();
$autores = Autor::getAutor();
$autorlivro = AutorLivro::getAutorLivro();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagemlivros.php';
include __DIR__ . '/includes/footer.php';