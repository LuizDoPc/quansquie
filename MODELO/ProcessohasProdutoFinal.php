<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class ProcessohasProdutoFinal{

    protected $table = 'Processo_has_ProdutoFinal';
    private $Processo_idProcesso;
    private $ProdutoFinal_idProdutoFinal;

    /**
     * ProcessohasProdutoFinal constructor.
     */
    public function __construct(...$id){
        if(count($id) == 2){
            $res = $this->find($id[0], $id[1]);
            $this->Processo_idProcesso = new Processo($res->Processo_idProcesso);
            $this->ProdutoFinal_idProdutoFinal = new ProdutoFinal($res->ProdutoFinal_idProdutoFinal);
        }
    }

    public function insert(){
        $query = 'INSERT INTO Processo_has_ProdutoFinal (Processo_idProcesso, ProdutoFinal_idProdutoFinal)  VALUES (:tipo, :caracteristica);';

        $stmt = DB::prepare($query);

        $pr = $this->Processo_idProcesso->getIdProcesso();
        $pf = $this->ProdutoFinal_idProdutoFinal->getIdProdutoFinal();
        $stmt->bindParam(':tipo', $pr);
        $stmt->bindParam(':caracteristica', $pf);
        return $stmt->execute();
    }

    public function find($pr, $pf){
        $query = 'SELECT * FROM Processo_has_ProdutoFinal WHERE Processo_idProcesso = :pr AND ProdutoFinal_idProdutoFinal = :pf';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':pr', $pr);
        $stmt->bindParam(':pf', $pf);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findPf($pf){
        $query = 'SELECT * FROM Processo_has_ProdutoFinal WHERE ProdutoFinal_idProdutoFinal = :pf';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':pf', $pf);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($pr, $pf){
        $query = 'UPDATE Processo_has_ProdutoFinal SET Processo_idProcesso = :proc, ProdutoFinal_idProdutoFinal = :prodF WHERE Processo_idProcesso = :pr AND ProdutoFinal_idProdutoFinal = :pf';

        $stmt = DB::prepare($query);
        $prN = $this->Processo_idProcesso->getIdProcesso();
        $pfN = $this->ProdutoFinal_idProdutoFinal->getIdProdutoFinal();
        $stmt->bindParam(':proc', $prN);
        $stmt->bindParam(':prodF', $pfN);
        $stmt->bindParam(':pr', $pr);
        $stmt->bindParam(':pf', $pf);
        return $stmt->execute();
    }

    public function delete($pr, $pf){
        $query = 'DELETE FROM Processo_has_ProdutoFinal WHERE Processo_idProcesso = :pr AND ProdutoFinal_idProdutoFinal = :pf';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':pr', $pr);
        $stmt->bindParam(':pf', $pf);
        return $stmt->execute();
    }

    public function deletePf($pf){
        $query = 'DELETE FROM Processo_has_ProdutoFinal WHERE ProdutoFinal_idProdutoFinal = :pf';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':pf', $pf);
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
    public function getProcessoIdProcesso()
    {
        return $this->Processo_idProcesso;
    }

    /**
     * @param mixed $Processo_idProcesso
     */
    public function setProcessoIdProcesso($Processo_idProcesso)
    {
        $this->Processo_idProcesso = new Processo($Processo_idProcesso);
    }

    /**
     * @return mixed
     */
    public function getProdutoFinalIdProdutoFinal()
    {
        return $this->ProdutoFinal_idProdutoFinal;
    }

    /**
     * @param mixed $ProdutoFinal_idProdutoFinal
     */
    public function setProdutoFinalIdProdutoFinal($ProdutoFinal_idProdutoFinal)
    {
        $this->ProdutoFinal_idProdutoFinal = new ProdutoFinal($ProdutoFinal_idProdutoFinal);
    }
}