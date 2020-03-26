<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 19:45
 */

require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';

$nome = $_GET['nome'];
$valor = $_GET['valor'];
$insumo = $_GET['insumo'];

$mp = new MateriaPrima();
$mp->setNome($nome);
$mp->setValor($valor);
$mp->setInsumoIdInsumo($insumo);
echo $mp->insert();