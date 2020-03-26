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

$c = new Caracteristica();

echo $c->delete($id);