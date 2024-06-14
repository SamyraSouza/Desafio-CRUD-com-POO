<?php 

header('Content-Type> application/json');

$email= $_POST['email'];
$senha = $_POST['senha'];

$pdo = new PDO('mysql:host=localhost; dbname=livraria;','root', '1234');

$stmt = $pdo->prepare('select * from adm where email = :em and senha = :sen');


$stmt->bindValue(':em', $email);
$stmt->bindValue(':sen', $senha);

$stmt->execute();

if($stmt->rowCount() >= 1){
    
    echo json_encode($email);

}else{

    echo json_encode('error');

}

?>