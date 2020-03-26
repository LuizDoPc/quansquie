<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/01/2018
 * Time: 11:45
 */

require_once '../../MODELO/ProdutoNaoAcabado.php';
require_once '../../MODELO/TipoProduto.php';
require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Compoe.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';

$id_pna = $_GET['id_pna'];
$id_mp = $_GET['id_mp'];

$cp = new Compoe();

$cp->setProdutoNaoAcabadoIdProdutoNaoAcabado($id_pna);
$cp->setMateriaPrimaIdMateriaPrima($id_mp);

echo $cp->insert();