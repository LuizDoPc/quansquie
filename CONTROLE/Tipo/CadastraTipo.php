<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:04
 */

require_once '../../MODELO/Tipo.php';


$nome = $_GET['nome'];

$t = new Tipo();
$t->setNome($nome);
$t->insert();