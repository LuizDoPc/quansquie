<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 20/11/2017
 * Time: 09:43
 */

require_once '../MODELO/Cor.php';

$c = new Cor();

$res = $c->findAll();

for($i=0; $i<count($res); $i++){

    echo '<div class="row">
                <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idCor.'">
                    <hr>
                    <div class="flow-text dark">'.$res[$i]->Nome.'</div>
                    <div class="flow-text light">'.$res[$i]->idCor.'</div>
                    <hr>
                </div>
          </div>';

}