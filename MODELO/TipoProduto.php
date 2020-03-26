<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class TipoProduto extends Crud{

    protected $table = 'TipoProduto';
    private $idTipoProduto;
    private $Nome;
    private $Tamanho;


    /**
     * TipoProduto constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idTipoProduto = $res->idTipoProduto;
            $this->Nome = $res->Nome;
            $this->Tamanho = $res ->Tamanho;
        }
    }



    public function insert(){
        $query = 'INSERT INTO TipoProduto (Nome, Tamanho) VALUE (:nome, :tamanho)';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':tamanho', $this->Tamanho);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM TipoProduto WHERE idTipoProduto = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE TipoProduto SET Nome = :nome, Tamanho = :tamanho WHERE idTipoProduto = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':tamanho', $this->Tamanho);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM TipoProduto WHERE idTipoProduto = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdTipoProduto()
    {
        return $this->idTipoProduto;
    }

    /**
     * @param mixed $idTipoProduto
     */
    public function setIdTipoProduto($idTipoProduto)
    {
        $this->idTipoProduto = $idTipoProduto;
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
    public function getTamanho()
    {
        return $this->Tamanho;
    }

    /**
     * @param mixed $Tamanho
     */
    public function setTamanho($Tamanho)
    {
        $this->Tamanho = $Tamanho;
    }
}