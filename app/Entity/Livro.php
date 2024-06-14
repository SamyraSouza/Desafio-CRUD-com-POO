<?php 
namespace App\Entity;

use \App\Db\DatabaseLivro;

use \PDO;

class Livro{

    public $ISBN;
    
    public $titulo;

    public $idCategoria;

    public $preco;

    public $dataPubli;



    public function cadastrar(){
        
     $obDatabaseLivro = new DatabaseLivro('livros');

        $obDatabaseLivro->insert([
        'ISBN' => $this->ISBN,
        'titulo' => $this->titulo,
        'idCategoria' => $this->idCategoria,
        'preco' => $this->preco,
        'dataPubli' => $this->dataPubli,
    
     ]);
    
     return true;
    }

    public function atualizar(){

        $isbn="'".$this->ISBN."'";

        return (new DatabaseLivro('livros'))->update('ISBN= '.$isbn, [
        'ISBN' => $this->ISBN,
        'titulo' => $this->titulo,
        'idCategoria' => $this->idCategoria,
        'preco' => $this->preco,
        'dataPubli' => $this->dataPubli

        ]);
    }

    public function excluirLivro(){

        $isbn="'".$this->ISBN."'";
        return (new DatabaseLivro('livros'))->delete('ISBN= '.$isbn.' and ISBN NOT IN (SELECT ISBN_liv FROM emprestimo)');
    }

    public static function getLivro(){

        return (new DatabaseLivro('livros'))->select()
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getLiv(){

        return (new DatabaseLivro('livros'))->selectliv()
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getLivros($ISBN){
        return (new DatabaseLivro('livros'))->select('ISBN = '.$ISBN)
        ->fetchObject(self::class);
    }

    public static function getLivr($ISBN){
        return (new DatabaseLivro('livros'))->selectedit('ISBN = '.$ISBN)
        ->fetchObject(self::class);
    }
}
?>