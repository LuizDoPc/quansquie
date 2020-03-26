<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/01/2018
 * Time: 13:44
 */

require_once '../../MODELO/Processo.php';

$id = $_GET['id'];

$t = new Processo();

echo $t->delete($id);