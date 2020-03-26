<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:34
 */

require_once '../../MODELO/TipoProduto.php';

$id = $_GET['id'];
$nome = $_GET['nome'];
$tamanho = $_GET['tamanho'];

$t = new TipoProduto();
$t->setNome($nome);
$t->setTamanho($tamanho);
$t->update($id);