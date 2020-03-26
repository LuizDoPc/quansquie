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

$id =$_GET['id'];

$pf = new ProdutoFinal();
$phpf = new ProcessohasProdutoFinal();


echo $phpf->deletePf($id);
echo $pf->delete($id);
