<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/02/2018
 * Time: 10:14
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$id = $_GET['id'];
$nome = $_GET['nome'];
$descricao = $_GET['descricao'];

$c = new Caracteristica();

$c->setNome($nome);
$c->setDescricao($descricao);
$c->update($id);