<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Categoria;

define('PG', 'Categorias');

$categorias = Categoria::getCategoria();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagemcategorias.php';
include __DIR__ . '/includes/footer.php';