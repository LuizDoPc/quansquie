<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:34
 */

require_once '../../MODELO/TipoProduto.php';

$id = $_GET['id'];

$t = new TipoProduto();

echo $t->delete($id);