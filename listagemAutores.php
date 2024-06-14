<?php

require __DIR__.'/vendor/autoload.php';

define('PG', 'Autores');

use \App\Entity\Autor;

$autores = Autor::getAutor();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagemautores.php';
include __DIR__ . '/includes/footer.php';