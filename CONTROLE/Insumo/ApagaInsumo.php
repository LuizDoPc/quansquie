<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 10:20
 */

require_once '../../MODELO/Insumo.php';

$id = $_GET['id'];

$i = new Insumo();

echo $i->delete($id);