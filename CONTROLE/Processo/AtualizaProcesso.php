<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/01/2018
 * Time: 13:44
 */

require_once '../../MODELO/Processo.php';

$id = $_GET['id'];
$nome = $_GET['nome'];
$valor = $_GET['valor'];

$t = new Processo();
$t->setNome($nome);
$t->setValor($valor);
$t->update($id);