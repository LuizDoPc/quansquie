<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class Insumo extends Crud{

    protected $table = 'Insumo';
    private $idInsumo;
    private $Nome;
    private $Tipo_idTipo;


    /**
     * Insumo constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idInsumo = $res->idInsumo;
            $this->Nome = $res->Nome;
            $this->Tipo_idTipo = new Tipo($res ->Tipo_idTipo);
        }
    }



    public function insert(){
        $query = 'INSERT INTO Insumo (Nome, Tipo_idTipo) VALUE (:nome, :tipo)';

        $idTipo = $this->Tipo_idTipo->getIdTipo();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':tipo', $idTipo);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM Insumo WHERE idInsumo = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE Insumo SET Nome = :nome, Tipo_idTipo = :tipo WHERE idInsumo = :id';

        $idTipo = $this->Tipo_idTipo->getIdTipo();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':tipo', $idTipo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM Insumo WHERE idInsumo = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdInsumo()
    {
        return $this->idInsumo;
    }

    /**
     * @param mixed $idInsumo
     */
    public function setIdInsumo($idInsumo)
    {
        $this->idInsumo = $idInsumo;
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
    public function getTipo_idTipo()
    {
        return $this->Tipo_idTipo;
    }

    /**
     * @param mixed $Tipo_idTipo
     */
    public function setTipo_idTipo($Tipo_idTipo)
    {
        $this->Tipo_idTipo = new Tipo($Tipo_idTipo);
    }
}