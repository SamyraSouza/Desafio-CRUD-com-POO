<?php 
namespace App\Entity;

use \App\Db\DatabaseCliente;
use \PDO;

class Cliente{

    public $id;

    public $Nome;

    public $Contato;


    public function cadastrar(){

     $obDatabaseCliente = new DatabaseCliente('cliente');
     $this->id = $obDatabaseCliente->insert([
        'Nome' => $this->Nome,
        'Contato' => $this->Contato
     ]);
    
     return true;
    }

    public function atualizar(){
        return (new DatabaseCliente('cliente'))->update('id ='.$this->id,[
            'Nome' => $this->Nome,
            'Contato' => $this->Contato
        ]);
    }

    public function excluirCliente(){
        return (new DatabaseCliente('cliente'))->delete('id= '.$this->id.' and id NOT IN (SELECT idCliente FROM emprestimo)');
    }

    public static function getCliente($where=null, $order=null, $limit=null){
        return (new DatabaseCliente('cliente'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getCli($id){
        return (new DatabaseCliente('cliente'))->select('id = '.$id)
        ->fetchObject(self::class);
    }
}
?>