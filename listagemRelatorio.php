<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Livro;
use \App\Entity\Categoria;
use \App\Entity\Autor;
use \App\Entity\Emprestimo;
use \App\Entity\AutorLivro;

define('PG', 'Relatório');

$livros = Livro::getLivro();
$categorias = Categoria::getCategoria();
$autores = Autor::getAutor();
$autorlivro = AutorLivro::getAutorLivro();
$emprestimos = Emprestimo::getData();


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagemrelatorio.php';
include __DIR__ . '/includes/footer.php';