<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 20:58
 */

require_once '../../MODELO/CaracteristicahasMateriaPrima.php';
require_once '../../MODELO/Caracteristica.php';
require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';

$idmp = $_GET['mp'];
$idcr = $_GET['cr'];

$chmp = new CaracteristicahasMateriaPrima();

$chmp->setCaracteristicaIdCaracteristica($idcr);
$chmp->setMateriaPrimaIdMateriaPrima($idmp);

$chmp->insert();