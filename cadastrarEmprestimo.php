<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Emprestimo;
use \App\Entity\Livro;
use \App\Entity\Cliente;

define('TITLE', 'Cadastar Empréstimo');
define('PG', 'Emprestimos');
// echo"<pre>";print_r($_POST); echo"</pre>";exit;

 $obEmprestimo = new Emprestimo;

 $livros = Livro::getLiv();
 $clientes = Cliente::getCliente();
 $emprestimos = Emprestimo::getEmprestimo();

if(isset($_POST['dataEmpre'],$_POST['dataDevo'],$_POST['idCliente'],$_POST['ISBN_liv'])){
   
    $obEmprestimo->dataEmpre = $_POST['dataEmpre'];  
    $obEmprestimo->dataDevo = $_POST['dataDevo'];   
    $obEmprestimo->idCliente = $_POST['idCliente'];
    $obEmprestimo->ISBN_liv = $_POST['ISBN_liv'];

    $obEmprestimo->cadastrar();
    

    header('location: listagemEmprestimo.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioemprestimos.php';
include __DIR__ . '/includes/footer.php';