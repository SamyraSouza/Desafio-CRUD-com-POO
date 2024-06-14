<?php 
namespace App\Entity;

use \App\Db\DatabaseCategoria;
use \App\Db\DatabaseLivro;
use \PDO;

class Categoria{

    public $id;
    
    public $Nomes;

    public function cadastrar(){
     $obDatabaseCategoria = new DatabaseCategoria('categoria');

     $this->id = $obDatabaseCategoria->insert([
        'Nomes' => $this->Nomes
     ]);
    
     return true;
    }

    public function atualizar(){
        return (new DatabaseCategoria('categoria'))->update('id= '.$this->id, [
            'Nomes ' => $this->Nomes
        ]);
    }

    public function excluirCategoria(){
        return (new DatabaseCategoria('categoria'))->delete('id= '.$this->id);
    }

    public static function getCategoria($where=null, $order=null, $limit=null){
        return (new DatabaseCategoria('categoria'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getCategorias($id){
        return (new DatabaseCategoria('categoria'))->select('id = '.$id)
        ->fetchObject(self::class);
    }
}
?>