<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 20:42
 */

require_once '../../MODELO/Caracteristica.php';

$carac = new Caracteristica();

$res = $carac->findAll();

for($i=0; $i<count($res); $i++){

    echo '<option value="'.$res[$i]->idCaracteristica.'">'.$res[$i]->Nome.'</option>';

}