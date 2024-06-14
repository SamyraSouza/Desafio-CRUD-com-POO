<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class DatabaseLivro{
    const HOST = 'localhost';

    const NAME = 'livraria';

    const USER = 'root';

    const PASS = '1234';

    private $tablelivro;

    private $connection;

    public function __construct($tablelivro = null){
        $this->tablelivro = $tablelivro;
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


    public function insert($valuesLivro){
        $fieldsLivro = array_keys($valuesLivro);
        $bindsLivro = array_pad([], count($fieldsLivro), '?');
        $queryLivro = 'INSERT INTO '.$this->tablelivro.' ('.implode(',',$fieldsLivro).') VALUES ('.implode(',',$bindsLivro).')';

        $this->execute($queryLivro,array_values($valuesLivro));  
    }

    public function execute($queryLivro,$paramsLivro=[]){
        try{
            $statementLivro = $this->connection->prepare($queryLivro);
            $statementLivro->execute($paramsLivro);

            return $statementLivro;
        }catch(PDOExcepiton $e){
               die('ERROR:'.$e->getMessage());
            }
    }

    public function select($where=null, $order='', $limit=null, $fieldsLivro='l.ISBN, c.id, l.idCategoria, c.Nomes, l.titulo, l.preco, l.dataPubli'){
        
     
        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'';
        $limit = strlen($limit) ? 'limit '.$limit:'';

        $queryLivro = 'select '.$fieldsLivro.' from categoria as c inner join livros as l on c.id = l.idCategoria '.$where.''.$order.''.$limit;
   
        return $this->execute($queryLivro);
    }

    public function selectliv($where=null, $order='', $limit=null, $fieldsLivro='*'){
        
     
        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'';
        $limit = strlen($limit) ? 'limit '.$limit:'';

        $queryLivro = 'select '.$fieldsLivro.' from livros l WHERE l.ISBN NOT IN (SELECT ISBN_liv FROM emprestimo);';
   
        return $this->execute($queryLivro);
    }

    public function selectedit($where=null, $order='', $limit=null, $fieldsLivro='*'){
        
     
        $where = strlen($where) ? 'where '.$where:'';
        $order = strlen($order) ? 'order by '.$order:'';
        $limit = strlen($limit) ? 'limit '.$limit:'';

        $queryLivro = 'select '.$fieldsLivro.' from livros l WHERE l.ISBN NOT IN (SELECT ISBN_liv FROM emprestimo);';
   
        return $this->execute($queryLivro);
    }


    public function update($where,$valuesLivro){

        $fieldsLivro = array_keys($valuesLivro);
    
       
        $queryLivro = 'update '.$this->tablelivro.' set '.implode('=?,',$fieldsLivro).'=? where '.$where;

        $this->execute($queryLivro,array_values($valuesLivro));

        return true;
    }

    public function delete($isbn){

        $queryLivro = 'delete from '.$this->tablelivro.' where ' .$isbn;


        $this->execute($queryLivro);
    
        return true;
    }
    }
    
