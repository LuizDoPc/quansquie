<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class CaracteristicahasMateriaPrima{

    protected $table = 'Caracteristica_has_MateriaPrima';
    private $Caracteristica_idCaracteristica;
    private $MateriaPrima_idMateriaPrima;

    /**
     * CaracteristicahasMateriaPrima constructor.
     */
    public function __construct(...$id){
        if(count($id) == 2){
            $res = $this->find($id[0], $id[1]);
            $this->Caracteristica_idCaracteristica = new Caracteristica($res->Caracteristica_idCaracteristica);
            $this->MateriaPrima_idMateriaPrima = new MateriaPrima($res->MateriaPrima_idMateriaPrima);
        }
    }

    public function insert(){
        $query = 'INSERT INTO Caracteristica_has_MateriaPrima (Caracteristica_idCaracteristica, MateriaPrima_idMateriaPrima)  VALUES (:carac, :matPri);';

        $stmt = DB::prepare($query);

        $cr = $this->Caracteristica_idCaracteristica->getIdCaracteristica();
        $mp = $this->MateriaPrima_idMateriaPrima->getIdMateriaPrima();
        $stmt->bindParam(':carac', $cr);
        $stmt->bindParam(':matPri', $mp);
        return $stmt->execute();
    }

    public function find($cr, $mp){
        $query = 'SELECT * FROM Caracteristica_has_MateriaPrima WHERE Caracteristica_idCaracteristica = :cr AND MateriaPrima_idMateriaPrima = :mp';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':cr', $cr);
        $stmt->bindParam(':mp', $mp);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findMP($mp){
        $query = 'SELECT * FROM Caracteristica_has_MateriaPrima WHERE MateriaPrima_idMateriaPrima = :mp';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':mp', $mp);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($cr, $mp){
        $query = 'UPDATE Caracteristica_has_MateriaPrima SET Caracteristica_idCaracteristica = :crarac, MateriaPrima_idMateriaPrima = :matpri WHERE Caracteristica_idCaracteristica = :cr AND MateriaPrima_idMateriaPrima = :mp';

        $stmt = DB::prepare($query);
        $crN = $this->Caracteristica_idCaracteristica->getIdCaracteristica();
        $mpN = $this->MateriaPrima_idMateriaPrima->getIdMateriaPrima();
        $stmt->bindParam(':carac', $crN);
        $stmt->bindParam(':maatpri', $mpN);
        $stmt->bindParam(':cr', $cr);
        $stmt->bindParam(':mp', $mp);
        return $stmt->execute();
    }

    public function delete($cr, $mp){
        $query = 'DELETE FROM Caracteristica_has_MateriaPrima WHERE Caracteristica_idCaracteristica = :cr AND MateriaPrima_idMateriaPrima = :mp';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':cr', $cr);
        $stmt->bindParam(':mp', $mp);
        return $stmt->execute();
    }

    public function deleteMP($mp){
        $query = 'DELETE FROM Caracteristica_has_MateriaPrima WHERE MateriaPrima_idMateriaPrima = :mp';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':mp', $mp);
        return $stmt->execute();
    }


    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getCaracteristicaIdCaracteristica()
    {
        return $this->Caracteristica_idCaracteristica;
    }

    /**
     * @param mixed $Caracteristica_idCaracteristica
     */
    public function setCaracteristicaIdCaracteristica($Caracteristica_idCaracteristica)
    {
        $this->Caracteristica_idCaracteristica = new Caracteristica($Caracteristica_idCaracteristica);
    }

    /**
     * @return mixed
     */
    public function getMateriaPrimaIdMateriaPrima()
    {
        return $this->MateriaPrima_idMateriaPrima;
    }

    /**
     * @param mixed $MateriaPrima_idMateriaPrima
     */
    public function setMateriaPrimaIdMateriaPrima($MateriaPrima_idMateriaPrima)
    {
        $this->MateriaPrima_idMateriaPrima = new MateriaPrima($MateriaPrima_idMateriaPrima);
    }
}