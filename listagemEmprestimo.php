<?php

require __DIR__.'/vendor/autoload.php';

define('PG', 'Emprestimos');

use \App\Entity\Emprestimo;
use \App\Entity\Livro;
use \App\Entity\Cliente;

$livros = Livro::getLivro();
$emprestimo = Emprestimo::getEmprestimo();
$cliente = Cliente::getCliente();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagememprestimo.php';
include __DIR__ . '/includes/footer.php';