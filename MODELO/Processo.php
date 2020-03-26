<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class Processo extends Crud{

    protected $table = 'Processo';
    private $idProcesso;
    private $Nome;
    private $Valor;


    /**
     * Processo constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idProcesso = $res->idProcesso;
            $this->Nome = $res->Nome;
            $this->Valor = $res ->Valor;
        }
    }



    public function insert(){
        $query = 'INSERT INTO Processo (Nome, Valor) VALUE (:nome, :valor)';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':valor', $this->Valor);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM Processo WHERE idProcesso = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE Processo SET Nome = :nome, Valor = :valor WHERE idProcesso = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':valor', $this->Valor);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM Processo WHERE idProcesso = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdProcesso()
    {
        return $this->idProcesso;
    }

    /**
     * @param mixed $idProcesso
     */
    public function setIdProcesso($idProcesso)
    {
        $this->idProcesso = $idProcesso;
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
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param mixed $Valor
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
    }
}