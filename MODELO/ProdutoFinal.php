<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/11/2017
 * Time: 10:16
 */
require_once 'Crud.php';
class ProdutoFinal extends Crud{

    protected $table = 'ProdutoFinal';
    private $idProdutoFinal;
    private $Nome;
    private $Custo_Final_Primario;
    private $ProdutoNaoAcabado_idProdutoNaoAcabado;


    /**
     * ProdutoFinal constructor.
     */
    public function __construct(...$id){
        if(count($id) == 1){
            $res = $this->find($id[0]);
            $this->idProdutoFinal = $res->idProdutoFinal;
            $this->Nome = $res->Nome;
            $this->Custo_Final_Primario = $res ->Custo_Final_Primario;
            $this->ProdutoNaoAcabado_idProdutoNaoAcabado = new ProdutoNaoAcabado($res->ProdutoNaoAcabado_idProdutoNaoAcabado);
        }
    }


    public function insert(){
        $query = 'INSERT INTO ProdutoFinal (Nome, Custo_Final_Primario, ProdutoNaoAcabado_idProdutoNaoAcabado) VALUE (:nome, :custo_Final_Primario, :produtoNaoAcabado)';

        $produtoNaoAcabado = $this->ProdutoNaoAcabado_idProdutoNaoAcabado->getIdProdutoNaoAcabado();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':custo_Final_Primario', $this->Custo_Final_Primario);
        $stmt->bindParam(':produtoNaoAcabado', $produtoNaoAcabado);
        $stmt->execute();
        return DB::getInstance()->lastInsertId();
    }

    public function find($id){
        $query = 'SELECT * FROM ProdutoFinal WHERE idProdutoFinal = :id';
        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id){
        $query = 'UPDATE ProdutoFinal SET Nome = :nome, Custo_Final_Primario = :custo_Final_Primario WHERE idProdutoFinal = :id';

        $produtoNaoAcabado = $this->ProdutoNaoAcabado_idProdutoNaoAcabado->getIdProdutoNaoAcabado();

        $stmt = DB::prepare($query);
        $stmt->bindParam(':nome', $this->Nome);
        $stmt->bindParam(':custo_Final_Primario', $this->Custo_Final_Primario);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id){
        $query = 'DELETE FROM ProdutoFinal WHERE idProdutoFinal = :id';

        $stmt = DB::prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getIdProdutoFinal()
    {
        return $this->idProdutoFinal;
    }

    /**
     * @param mixed $idProdutoFinal
     */
    public function setIdProdutoFinal($idProdutoFinal)
    {
        $this->idProdutoFinal = $idProdutoFinal;
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
    public function getCusto_Final_Primario()
    {
        return $this->Custo_Final_Primario;
    }

    /**
     * @param mixed $Custo_Final_Primario
     */
    public function setCusto_Final_Primario($Custo_Final_Primario)
    {
        $this->Custo_Final_Primario = $Custo_Final_Primario;
    }

    /**
     * @return ProdutoNaoAcabado
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