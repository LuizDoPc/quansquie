<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/01/2018
 * Time: 11:44
 */
require_once '../../MODELO/ProdutoNaoAcabado.php';
require_once '../../MODELO/TipoProduto.php';

$nome = $_GET['nome'];
$custo = $_GET['custo'];
$tp = $_GET['tp'];

$pna = new ProdutoNaoAcabado();

$pna->setNome($nome);
$pna->setCusto($custo);
$pna->setTipoProduto_idTipoProduto($tp);

echo $pna->insert();
