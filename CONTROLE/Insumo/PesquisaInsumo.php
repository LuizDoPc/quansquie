<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 10:21
 */

require_once '../../MODELO/Insumo.php';

$campo = $_GET['campo'];

$t = new Insumo();

$res = $t->findNome($campo);

for($i=0; $i<count($res); $i++){

    echo '<div class="row">
                <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idInsumo.'">
                    <hr>
                    <div class="flow-text dark">'.$res[$i]->Nome.'</div>
                    <div class="flow-text light">'.$res[$i]->idInsumo.'</div>
                    <hr>
                </div>
          </div>';
}