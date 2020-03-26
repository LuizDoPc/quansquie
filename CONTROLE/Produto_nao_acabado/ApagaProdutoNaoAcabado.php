<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 20:57
 */

require_once '../../MODELO/ProdutoNaoAcabado.php';
require_once '../../MODELO/TipoProduto.php';
require_once '../../MODELO/Compoe.php';


$id = $_GET['id'];

$pna = new ProdutoNaoAcabado();
$cp = new Compoe();

echo $cp->deletePna($id);
echo $pna->delete($id);