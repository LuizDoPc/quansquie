<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 20:23
 */

require_once '../../MODELO/Caracteristica.php';


$nome = $_GET['nome'];
$descricao = $_GET['descricao'];

$cr = new Caracteristica();
$cr->setNome($nome);
$cr->setDescricao($descricao);

$cr->insert();