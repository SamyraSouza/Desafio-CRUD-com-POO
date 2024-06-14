<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class DatabaseEmprestimo{

    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tableemprestimo;

    private $connection;

    public function __construct($tableemprestimo = null){
        $this->tableemprestimo = $tableemprestimo;
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

public function execute($queryEmprestimo,$paramsEmprestimo=[]){
    try{
        $statementEmprestimo = $this->connection->prepare($queryEmprestimo);
        $statementEmprestimo->execute($paramsEmprestimo);
        return $statementEmprestimo;
    }catch(PDOExcepiton $e){
           die('ERROR:'.$e->getMessage());
        }
}

public function insert($valuesEmprestimo){
    $fieldsEmprestimo = array_keys($valuesEmprestimo);
    $bindsEmprestimo = array_pad([], count($fieldsEmprestimo), '?');

    $queryEmprestimo = 'INSERT INTO '.$this->tableemprestimo.' ('.implode(',',$fieldsEmprestimo).') VALUES ('.implode(',',$bindsEmprestimo).')';
    $this->execute($queryEmprestimo,array_values($valuesEmprestimo));

    return $this->connection->lastInsertId();

}


    public function select($where=null, $order=null, $limit=null, $fieldsEmprestimo='l.ISBN, e.dataEmpre, e.dataDevo, l.titulo, c.Nome, c.Contato, e.idE'){

        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'dataEmpre, Nome, Contato';
        $limit = strlen($limit) ? 'limit '.$limit:'';
   
        $queryEmprestimo = 'select '.$fieldsEmprestimo.' from livros as l inner join emprestimo as e on l.ISBN = e.ISBN_liv join cliente c on c.id = e.idCliente '.$where.' order by '.$order.' '.$limit;

        return $this->execute($queryEmprestimo);
    }

    public function update($where,$valuesEmprestimo){
    
        $fieldsEmprestimo = array_keys($valuesEmprestimo);
    
        $queryEmprestimo = 'update '.$this->tableemprestimo.' set '.implode('=?,',$fieldsEmprestimo).'=? where '.$where;

        $this->execute($queryEmprestimo,array_values($valuesEmprestimo));
    
        return true;
    }
    
    public function delete($where){
        $queryEmprestimo = 'delete from '.$this->tableemprestimo.' where '.$where;

        $this->execute($queryEmprestimo);
    
        return true;
    }

    public function selectdata($where=null, $order=null, $limit=null, $fieldsEmprestimo='idE'){

        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'';
        $limit = strlen($limit) ? 'limit '.$limit:'';
    
        $queryEmprestimo = 'select dataEmpre, count('.$fieldsEmprestimo.') as idE from '.$this->tableemprestimo.' group by dataEmpre order by dataEmpre';

        return $this->execute($queryEmprestimo);
    }

    }
    