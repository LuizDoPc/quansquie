<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 20/11/2017
 * Time: 09:33
 */

require_once '../MODELO/Cor.php';


$nome = $_GET['nome'];

$c = new Cor();
$c->setNome($nome);
$c->insert();