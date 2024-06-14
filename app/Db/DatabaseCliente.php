<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class DatabaseCliente{

    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tablecliente;

    private $connection;

    public function __construct($tablecliente = null){
        $this->tablecliente = $tablecliente;
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

public function execute($queryCliente,$paramsCliente=[]){
    try{
        $statementCliente = $this->connection->prepare($queryCliente);
        $statementCliente->execute($paramsCliente);
        return $statementCliente;
    }catch(PDOExcepiton $e){
           die('ERROR:'.$e->getMessage());
        }
}

public function insert($valuesCliente){
    $fieldsCliente = array_keys($valuesCliente);
    $bindsCliente = array_pad([], count($fieldsCliente), '?');

    $queryCliente = 'INSERT INTO '.$this->tablecliente.' ('.implode(',',$fieldsCliente).') VALUES ('.implode(',',$bindsCliente).')';

    $this->execute($queryCliente,array_values($valuesCliente));

    return $this->connection->lastInsertId();
}


    public function select($where=null, $order=null, $limit=null, $fieldsCliente='*'){

        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'';
        $limit = strlen($limit) ? 'limit '.$limit:'';
    
        $queryCliente = 'select '.$fieldsCliente.' from '.$this->tablecliente.' '.$where.' '.$order.' '.$limit;
    
        return $this->execute($queryCliente);
    }
    
    public function update($where,$valuesCliente){
    
        $fieldsCliente = array_keys($valuesCliente);
    
        $queryCliente = 'update '.$this->tablecliente.' set '.implode('=?,',$fieldsCliente).'=? where '.$where;
       
        $this->execute($queryCliente,array_values($valuesCliente));
    
        return true;
    }
    
    public function delete($where){
        $queryCliente = 'delete from '.$this->tablecliente.' where '.$where;
    
        $this->execute($queryCliente);
    
        return true;
    }
    }
    