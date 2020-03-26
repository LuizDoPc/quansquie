<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:04
 */

require_once '../../MODELO/Tipo.php';

$id = $_GET['id'];

$t = new Tipo();

echo $t->delete($id);