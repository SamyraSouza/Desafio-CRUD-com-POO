<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class DatabaseAutorLivro{

    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tableautorlivro;

    private $connection;

    public function __construct($tableautorlivro = null){
        $this->tableautorlivro = $tableautorlivro;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOExcepiton $e){
           die('ERROR:'.$e->getMessage());
        }
    }

public function execute($queryAutorLivro,$paramsAutorLivro=[]){
    try{
        $statementAutorLivro = $this->connection->prepare($queryAutorLivro);
        $statementAutorLivro->execute($paramsAutorLivro);
        return $statementAutorLivro;
    }catch(PDOExcepiton $e){
           die('ERROR:'.$e->getMessage());
        }
}

public function insertAL($valuesAutorLivro){
    $fieldsAutorLivro = array_keys($valuesAutorLivro);
    $bindsAutorLivro = array_pad([], count($fieldsAutorLivro), '?');

    $queryAutorLivro = 'INSERT INTO '.$this->tableautorlivro.' ('.implode(',',$fieldsAutorLivro).') VALUES ('.implode(',',$bindsAutorLivro).')';

    $this->execute($queryAutorLivro,array_values($valuesAutorLivro));
  
    return $this->connection->lastInsertId();
}

public function selectAL($where=null, $order=null, $limit=null, $fieldsAutorLivro='l.ISBN, a.Nome, l.ISBN,l.titulo,c.Nomes,l.preco,l.dataPubli'){

    $where = strlen($where) ? 'where '.$where:'';
    $order = strlen($order) ? 'order by '.$order:'Nome, titulo';
    $limit = strlen($limit) ? 'limit '.$limit:'';

    $queryAutorLivro = 'select '.$fieldsAutorLivro.' from autores a join autorlivro al on a.id = al.idAutor join livros l on l.ISBN = al.ISBN_livro join categoria c on l.idCategoria=c.id'.$where.' order by '.$order.''.$limit;

    return $this->execute($queryAutorLivro);
}


public function select($where=null, $order=null, $limit=null, $fieldsAutorLivro='*'){

    $where = strlen($where) ? 'where '.$where:'';
    $order = strlen($order) ? 'order by '.$order:'';
    $limit = strlen($limit) ? 'limit '.$limit:'';

    $queryAutorLivro = 'select '.$fieldsAutorLivro.' from '.$this->tableautorlivro.' '.$where.' '.$order.' '.$limit;
   
    return $this->execute($queryAutorLivro);
    
}

public function updateAL($ISBN,$valuesAutorLivro){

    $isbn="'".$ISBN."'";

    $fieldsAutorLivro = array_keys($valuesAutorLivro);

    $queryAutorLivro = 'update '.$this->tableautorlivro.' set '.implode('=?,',$fieldsAutorLivro).'=? where ISBN_livro= '.$isbn;

    $this->execute($queryAutorLivro,array_values($valuesAutorLivro));

    return true;
}

public function deleteAL($ISBN){

    $isbn="'".$ISBN."'";

    $queryAutorLivro = 'delete from '.$this->tableautorlivro.' where ISBN_livro='.$isbn.' and ISBN_livro NOT IN (SELECT ISBN_liv FROM emprestimo)';

    $this->execute($queryAutorLivro);

    return true;
}
}
