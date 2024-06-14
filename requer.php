<?php 

header('Content-Type> application/json');


$pdo = new PDO('mysql:host=localhost; dbname=livraria;','root', '1234');

$stmt = $pdo->prepare('select livros.*,cliente.* from livros join requerimento on livros.ISBN=requerimento.livro join cliente on cliente.id=requerimento.pessoa');

$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

}else{
    echo json_encode('error');
}

?>