<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class MateriaPrima extends Crud{

    protected $table = 'MateriaPrima';
    private $idMateriaPrima;
    private $Nome;
    private $Valor;
    private $Insumo_idInsumo;


    /**
     * MateriaPrima constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idMateriaPrima = $res->idMateriaPrima;
            $this->Nome = $res->Nome;
            $this->Valor = $res ->Valor;
            $this->Insumo_idInsumo = new Insumo($res->Insumo_idInsumo);
        }
    }



    public function insert(){
        $query = 'INSERT INTO MateriaPrima (Nome, Valor, Insumo_idInsumo) VALUE (:nome, :valor, :insumo)';

        $insumo = $this->Insumo_idInsumo->getIdInsumo();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':valor', $this->Valor);
        $stmt->bindParam(':insumo', $insumo);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM MateriaPrima WHERE idMateriaPrima = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findInsumo($idinsumo){
        $query = 'SELECT * FROM MateriaPrima WHERE Insumo_idInsumo = :idinsumo';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':idinsumo', $idinsumo);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($id){
        $query = 'UPDATE MateriaPrima SET Nome = :nome, Valor = :valor WHERE idMateriaPrima = :id';

        $insumo = $this->Insumo_idInsumo->getIdInsumo();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':valor', $this->Valor);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM MateriaPrima WHERE idMateriaPrima = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdMateriaPrima()
    {
        return $this->idMateriaPrima;
    }

    /**
     * @param mixed $idMateriaPrima
     */
    public function setIdMateriaPrima($idTipoProduto)
    {
        $this->idMateriaPrima = $idTipoProduto;
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

    /**
     * @return Insumo
     */
    public function getInsumoIdInsumo()
    {
        return $this->Insumo_idInsumo;
    }

    /**
     * @param mixed $Insumo_idInsumo
     */
    public function setInsumoIdInsumo($Insumo_idInsumo)
    {
        $this->Insumo_idInsumo = new Insumo($Insumo_idInsumo);
    }

}