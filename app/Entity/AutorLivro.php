<?php 
namespace App\Entity;

use \App\Db\DatabaseAutorLivro;

use \PDO;

class AutorLivro{

    public $id;

    public $ISBN_livro;

    public $idAutor;

    public function cadastrarAL(){

     $obDatabaseAutorLivro = new DatabaseAutorLivro('autorlivro');
     $this->id = $obDatabaseAutorLivro->insertAL([
        'ISBN_livro' => $this->ISBN_livro,
        'idAutor' => $this->idAutor
        
     ]);
    
     return true;
    }

    public function atualizarAL(){

        return (new DatabaseAutorLivro('autorlivro'))->updateAL(''.$this->ISBN_livro,[
            'ISBN_livro' => $this->ISBN_livro,
            'idAutor' => $this->idAutor     
            
        ]);
    }

    public function excluirAutorLivro(){
        
        return (new DatabaseAutorLivro('autorlivro'))->deleteAL(''.$this->ISBN_livro);
    }

    public static function getAutorLivro(){
        return (new DatabaseAutorLivro('autorlivro'))->selectAL()
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    
    public static function getAutL($ISBN){
       
        return (new DatabaseAutorLivro('autorlivro'))->select(' ISBN_Livro =' .$ISBN)
        ->fetchObject(self::class);
    }
}
?>