<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:26
 */

require_once '../../MODELO/Tipo.php';

$campo = $_GET['campo'];

$t = new Tipo();

$res = $t->findNome($campo);

for($i=0; $i<count($res); $i++){

    echo '<div class="row">
                <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idTipo.'">
                    <hr>
                    <div class="flow-text dark">'.$res[$i]->Nome.'</div>
                    <div class="flow-text light">'.$res[$i]->idTipo.'</div>
                    <hr>
                </div>
          </div>';
}