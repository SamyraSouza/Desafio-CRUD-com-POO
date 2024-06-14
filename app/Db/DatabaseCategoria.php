<?php 

namespace App\Db;
use \PDO;
use \PDOException;


class DatabaseCategoria{

    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tablecategoria;

    private $connection;

    

    public function __construct($tablecategoria = null){
        $this->tablecategoria = $tablecategoria;
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

    public function execute($queryCategoria,$paramsCategoria=[]){
        try{
            $statementCategoria = $this->connection->prepare($queryCategoria);
            $statementCategoria->execute($paramsCategoria);
            return $statementCategoria;
        }catch(PDOExcepiton $e){
               die('ERROR:'.$e->getMessage());
            }
    }

    public function insert($valuesCategoria){
        $fieldsCategoria = array_keys($valuesCategoria);
        $bindsCategoria = array_pad([], count($fieldsCategoria), '?');
    
        $queryCategoria = 'INSERT INTO '.$this->tablecategoria.' ('.implode(',',$fieldsCategoria).') VALUES ('.implode(',',$bindsCategoria).')';
    
        $this->execute($queryCategoria,array_values($valuesCategoria));
    
     
    }
    

public function select($where=null, $order='', $limit=null, $fieldsCategoria='*'){

    $where = strlen($where) ? 'where '.$where:'';
    $order = strlen($order) ? 'order by '.$order:'';
    $limit = strlen($limit) ? 'limit '.$limit:'';

    $queryCategoria = 'select '.$fieldsCategoria.' from '.$this->tablecategoria.' '.$where.' '.$order.' '.$limit;

    return $this->execute($queryCategoria);
}

public function update($where,$valuesCategoria){

    $fieldsCategoria = array_keys($valuesCategoria);

    $queryCategoria = 'update '.$this->tablecategoria.' set '.implode('=?,',$fieldsCategoria).'=? where '.$where;
    
    $this->execute($queryCategoria,array_values($valuesCategoria));
    
    return true;
}

public function delete($where){

    $queryCategoria = 'delete from '.$this->tablecategoria.' where '.$where.' and id NOT IN (SELECT idCategoria FROM livros)';
    
    $this->execute($queryCategoria);
    
    return true;
    }
   
}
