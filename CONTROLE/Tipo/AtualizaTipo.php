<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:20
 */

require_once '../../MODELO/Tipo.php';

$id = $_GET['id'];
$nome = $_GET['nome'];

$t = new Tipo();
$t->setNome($nome);
$t->update($id);