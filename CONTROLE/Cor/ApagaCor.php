<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 20/11/2017
 * Time: 10:14
 */

require_once '../MODELO/Cor.php';

$id = $_GET['id'];

$c = new Cor();

$c->delete($id);