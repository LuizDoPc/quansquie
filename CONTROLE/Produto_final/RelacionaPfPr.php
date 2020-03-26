<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 21:25
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$id_pf = $_GET['id_pf'];
$id_pr = $_GET['id_pr'];

$phpf = new ProcessohasProdutoFinal();

$phpf->setProdutoFinalIdProdutoFinal($id_pf);
$phpf->setProcessoIdProcesso($id_pr);

echo $phpf->insert();