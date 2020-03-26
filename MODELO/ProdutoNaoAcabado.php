<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class ProdutoNaoAcabado extends Crud{

    protected $table = 'ProdutoNaoAcabado';
    private $idProdutoNaoAcabado;
    private $Nome;
    private $Custo;
    private $TipoProduto_idTipoProduto;


    /**
     * ProdutoNaoAcabado constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idProdutoNaoAcabado = $res->idProdutoNaoAcabado;
            $this->Nome = $res->Nome;
            $this->Custo = $res->Custo;
            $this->TipoProduto_idTipoProduto = new TipoProduto($res ->TipoProduto_idTipoProduto);
        }
    }



    public function insert(){
        $query = 'INSERT INTO ProdutoNaoAcabado (Nome, Custo, TipoProduto_idTipoProduto) VALUE (:nome, :custo, :tipo)';

        $idTipoProduto = $this->TipoProduto_idTipoProduto->getIdTipoProduto();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':custo', $this->Custo);
        $stmt->bindParam(':tipo', $idTipoProduto);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM ProdutoNaoAcabado WHERE idProdutoNaoAcabado = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE ProdutoNaoAcabado SET Nome = :nome, Custo = :custo, TipoProduto_idTipoProduto = :tipo WHERE idProdutoNaoAcabado = :id';

        $idTipoProduto = $this->TipoProduto_idTipoProduto->getIdTipoProduto();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':custo', $this->Custo);
        $stmt->bindParam(':tipo', $idTipoProduto);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM ProdutoNaoAcabado WHERE idProdutoNaoAcabado = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdProdutoNaoAcabado()
    {
        return $this->idProdutoNaoAcabado;
    }

    /**
     * @param mixed $idProdutoNaoAcabado
     */
    public function setIdProdutoNaoAcabado($idProdutoNaoAcabado)
    {
        $this->idProdutoNaoAcabado = $idProdutoNaoAcabado;
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
    public function getCusto()
    {
        return $this->Custo;
    }

    /**
     * @param mixed $Custo
     */
    public function setCusto($Custo)
    {
        $this->Custo = $Custo;
    }

    /**
     * @return mixed
     */
    public function getTipoProduto_idTipoProduto()
    {
        return $this->TipoProduto_idTipoProduto;
    }

    /**
     * @param mixed $TipoProduto_idTipoProduto
     */
    public function setTipoProduto_idTipoProduto($TipoProduto_idTipoProduto)
    {
        $this->TipoProduto_idTipoProduto = new TipoProduto($TipoProduto_idTipoProduto);
    }
}