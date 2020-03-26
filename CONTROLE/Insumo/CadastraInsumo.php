<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 10:21
 */

require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';


$nome = $_GET['nome'];
$tipo = $_GET['tipo'];

$i = new Insumo();
$i->setNome($nome);
$i->setTipo_idTipo($tipo);
$i->insert();