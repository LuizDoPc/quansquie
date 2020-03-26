<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 19:44
 */

require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/CaracteristicahasMateriaPrima.php';

$idmp = $_GET['id'];


$chmp = new CaracteristicahasMateriaPrima();
$mp = new MateriaPrima();

echo $chmp->deleteMP($idmp);
echo $mp->delete($idmp);