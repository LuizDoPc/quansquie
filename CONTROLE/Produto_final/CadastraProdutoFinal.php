<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 21:24
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$nome = $_GET['nome'];
$custo = $_GET['custo'];
$pna = $_GET['pna'];

$clpna = new ProdutoNaoAcabado($pna);

$custo = $custo+$clpna->getCusto();

$pf = new ProdutoFinal();

$pf->setNome($nome);
$pf->setCusto_Final_Primario($custo);
$pf->setProdutoNaoAcabadoIdProdutoNaoAcabado($pna);

echo $pf->insert();