<?php 
namespace App\Entity;

use \App\Db\DatabaseEmprestimo;
use \PDO;

class Emprestimo{

    public $idE;

    public $dataEmpre;

    public $dataDevo;

    public $idCliente;

    public $autorlivro;

    public $ISBN_liv;

    public function cadastrar(){


     $obDatabaseEmprestimo = new DatabaseEmprestimo('emprestimo');

  
     $this->idE = $obDatabaseEmprestimo->insert([
        'dataEmpre' => $this->dataEmpre, 
        'dataDevo' => $this->dataDevo,
        'idCliente' => $this->idCliente,
        'autorlivro' => $this->ISBN_liv,
        'ISBN_liv' => $this->ISBN_liv
     ]);
    
     return true;
    }


    public function atualizar(){ 
        return (new DatabaseEmprestimo('emprestimo'))->update('idE ='.$this->idE,[
            'dataDevo' => $this->dataDevo,
            
        ]);
    }

    public function excluirEmprestimo(){
        return (new DatabaseEmprestimo('emprestimo'))->delete('idE= '.$this->idE);
    }

    public static function getEmprestimo($where=null, $order=null, $limit=null){
        return (new DatabaseEmprestimo('emprestimo'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getEmpre($idE){
        return (new DatabaseEmprestimo('emprestimo'))->select('idE = '.$idE)
        ->fetchObject(self::class);
    }

    public static function getData($where=null, $order=null, $limit=null){
        return (new DatabaseEmprestimo('emprestimo'))->selectdata($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

}
?>