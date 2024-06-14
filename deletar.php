<?php 

header('Content-Type> application/json');

$livro = $_POST['livro'];


$pdo = new PDO('mysql:host=localhost; dbname=livraria;','root', '1234');


$reque = $pdo->prepare('delete from requerimento where livro = '.$livro);


$reque->execute();


    echo json_encode('success');

?>