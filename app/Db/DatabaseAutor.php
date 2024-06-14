<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class DatabaseAutor{

    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tableautores;

    private $connection;

    public function __construct($tableautores = null){
        $this->tableautores = $tableautores;
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

public function execute($queryAutor,$paramsAutor=[]){
    try{
        $statementAutor = $this->connection->prepare($queryAutor);
        $statementAutor->execute($paramsAutor);
        return $statementAutor;
    }catch(PDOExcepiton $e){
           die('ERROR:'.$e->getMessage());
        }
}

public function insert($valuesAutor){
    $fieldsAutor = array_keys($valuesAutor);
    $bindsAutor = array_pad([], count($fieldsAutor), '?');

    $queryAutor = 'INSERT INTO '.$this->tableautores.' ('.implode(',',$fieldsAutor).') VALUES ('.implode(',',$bindsAutor).')';

    $this->execute($queryAutor,array_values($valuesAutor));

    return $this->connection->lastInsertId();
}

public function select($where=null, $order=null, $limit=null, $fieldsAutor='*'){

    $where = strlen($where) ? 'where '.$where:'';
    $order = strlen($order) ? 'order by '.$order:'';
    $limit = strlen($limit) ? 'limit '.$limit:'';

    $queryAutor = 'select '.$fieldsAutor.' from '.$this->tableautores.' '.$where.' '.$order.' '.$limit;

    return $this->execute($queryAutor);
}

public function update($where,$valuesAutor){

    $fieldsAutor = array_keys($valuesAutor);

    $queryAutor = 'update '.$this->tableautores.' set '.implode('=?,',$fieldsAutor).'=? where '.$where;
   
    $this->execute($queryAutor,array_values($valuesAutor));

    return true;
}

public function delete($where){
    $queryAutor = 'delete from '.$this->tableautores.' where '.$where;

    $this->execute($queryAutor);

    return true;
}
}
