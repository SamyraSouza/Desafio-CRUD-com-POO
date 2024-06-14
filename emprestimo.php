<?php 

header('Content-Type> application/json');

$email = $_POST['pessoa'];
$livro = $_POST['livro'];
$data = $_POST['data'];
$dataEmpre = date('y-m-d');

$pdo = new PDO('mysql:host=localhost; dbname=livraria;','root', '1234');

$pegarid = $pdo->prepare('select id from cliente where email = "'.$email.'"');

$pegarid->execute();

$id = $pegarid->fetchAll(PDO::FETCH_ASSOC);

$ids = $id[0];

$i = $ids['id'];


$stmt = $pdo->prepare('insert into emprestimo (idCliente, ISBN_liv, dataDevo, dataEmpre,autorlivro) values ("'.$i.'"'.',"'.$livro.'","'.$data.'","'.$dataEmpre.'","'.$livro.'")');

$stmt->execute();

$reque = $pdo->prepare('delete from requerimento where livro = '.$livro);


$reque->execute();


if($stmt->rowCount() >= 1){
  
    echo json_encode('success');

}else{

    echo json_encode('error');

}
?>