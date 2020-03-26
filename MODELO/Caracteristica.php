<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class Caracteristica extends Crud{
    protected $table = 'Caracteristica';
    private $idCaracteristica;
    private $Nome;
    private $Descricao;


    /**
     * Cor constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idCaracteristica = $res->idCaracteristica;
            $this->Nome = $res->Nome;
            $this->Descricao = $res->Descricao;
        }
    }



    public function insert(){
        $query = 'INSERT INTO Caracteristica (Nome, Descricao) VALUE (:nome, :descricao);';


        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':descricao', $this->Descricao);
       
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM Caracteristica WHERE idCaracteristica = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE Caracteristica SET Nome = :nome, Descricao = :descricao WHERE idCaracteristica = :id';
        
        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':descricao', $this->Descricao);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM Caracteristica WHERE idCaracteristica = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    /**
     * @return mixed
     */
    public function getIdCaracteristica()
    {
        return $this->idCaracteristica;
    }

    /**
     * @param mixed $idCaracteristica
     */
    public function setIdCaracteristica($idCaracteristica)
    {
        $this->idCaracteristica = $idCaracteristica;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->Descricao;
    }

    /**
     * @param mixed $Descricao
     */
    public function setDescricao($Descricao)
    {
        $this->Descricao = $Descricao;
    }
}