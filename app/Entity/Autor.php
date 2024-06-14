<?php 
namespace App\Entity;

use \App\Db\DatabaseAutor;
use \PDO;

class Autor{

    public $id;

    public $Nome;

    public $Biografia;

    public $DataNasc;

    public function cadastrar(){

     $obDatabaseAutor = new DatabaseAutor('autores');
     $this->id = $obDatabaseAutor->insert([
        'Nome' => $this->Nome,
        'DataNasc' => $this->DataNasc,
        'Biografia' => $this->Biografia
        
     ]);
    
     return true;
    }

    public function atualizar(){
        return (new DatabaseAutor('autores'))->update('id ='.$this->id,[
            'Nome' => $this->Nome,
            'DataNasc' => $this->DataNasc,
            'Biografia' => $this->Biografia
        ]);
    }

    public function excluirAutor(){
        return (new DatabaseAutor('autores'))->delete('id= '.$this->id.' and id NOT IN (SELECT idAutor FROM autorlivro)');
        
    }

    public static function getAutor($where=null, $order=null, $limit=null){
        return (new DatabaseAutor('autores'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getAut($id){
        return (new DatabaseAutor('autores'))->select('id = '.$id)
        ->fetchObject(self::class);
    }
}
?>