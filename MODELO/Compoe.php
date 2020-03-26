<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class Compoe{

    protected $table = 'Compoe';
    private $MateriaPrima_idMateriaPrima;
    private $ProdutoNaoAcabado_idProdutoNaoAcabado;

    /**
     * Compoe constructor.
     */
    public function __construct(...$id){
        if(count($id) == 2){
            $res = $this->find($id[0], $id[1]);
            $this->MateriaPrima_idMateriaPrima = new MateriaPrima($res->MateriaPrima_idMateriaPrima);
            $this->ProdutoNaoAcabado_idProdutoNaoAcabado = new ProdutoNaoAcabado($res->ProdutoNaoAcabado_idProdutoNaoAcabado);
        }
    }

    public function insert(){
        $query = 'INSERT INTO Compoe (MateriaPrima_idMateriaPrima, ProdutoNaoAcabado_idProdutoNaoAcabado)  VALUES (:materiaPrima, :produtoNaoAcabado);';

        $stmt = DB::prepare($query);

        $mp = $this->MateriaPrima_idMateriaPrima->getIdMateriaPrima();
        $pna = $this->ProdutoNaoAcabado_idProdutoNaoAcabado->getIdProdutoNaoAcabado();
        $stmt->bindParam(':materiaPrima', $mp);
        $stmt->bindParam(':produtoNaoAcabado', $pna);
        return $stmt->execute();
    }

    public function find($mp, $pna){
        $query = 'SELECT * FROM Compoe WHERE MateriaPrima_idMateriaPrima = :mp AND ProdutoNaoAcabado_idProdutoNaoAcabado = :pna';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':mp', $mp);
        $stmt->bindParam(':pna', $pna);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findPna($pna){
        $query = 'SELECT * FROM Compoe WHERE ProdutoNaoAcabado_idProdutoNaoAcabado = :pna';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':pna', $pna);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($mp, $pna){
        $query = 'UPDATE Compoe SET MateriaPrima_idMateriaPrima = :materiaPrima, ProdutoNaoAcabado_idProdutoNaoAcabado = :produtoNaoAcabado WHERE MateriaPrima_idMateriaPrima = :mp AND ProdutoNaoAcabado_idProdutoNaoAcabado = :pna';

        $stmt = DB::prepare($query);
        $mpN = $this->MateriaPrima_idMateriaPrima->getIdMateriaPrima();
        $pnaN = $this->ProdutoNaoAcabado_idProdutoNaoAcabado->getIdProdutoNaoAcabado();
        $stmt->bindParam(':materiaPrima', $mpN);
        $stmt->bindParam(':produtoNaoAcabado', $pnaN);
        $stmt->bindParam(':mp', $mp);
        $stmt->bindParam(':pna', $pna);
        return $stmt->execute();
    }

    public function delete($mp, $pna){
        $query = 'DELETE FROM Compoe WHERE MateriaPrima_idMateriaPrima = :mp AND ProdutoNaoAcabado_idProdutoNaoAcabado = :pna';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':mp', $mp);
        $stmt->bindParam(':pna', $pna);
        return $stmt->execute();
    }

    public function deletePna($pna){
        $query = 'DELETE FROM Compoe WHERE ProdutoNaoAcabado_idProdutoNaoAcabado = :pna';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':pna', $pna);
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

    /**
     * @return mixed
     */
    public function getProdutoNaoAcabadoIdProdutoNaoAcabado()
    {
        return $this->ProdutoNaoAcabado_idProdutoNaoAcabado;
    }

    /**
     * @param mixed $ProdutoNaoAcabado_idProdutoNaoAcabado
     */
    public function setProdutoNaoAcabadoIdProdutoNaoAcabado($ProdutoNaoAcabado_idProdutoNaoAcabado)
    {
        $this->ProdutoNaoAcabado_idProdutoNaoAcabado = new ProdutoNaoAcabado($ProdutoNaoAcabado_idProdutoNaoAcabado);
    }
}