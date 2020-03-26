<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 19:45
 */

require_once '../../MODELO/MateriaPrima.php';

$campo = $_GET['campo'];

$t = new MateriaPrima();

$res = $t->findNome($campo);

for($i=0; $i<count($res); $i++){

    echo '<div class="row">
                <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idMateriaPrima.'">
                    <hr>
                    <div class="flow-text dark">'.$res[$i]->Nome.'</div>
                    <div class="flow-text light">'.$res[$i]->idMateriaPrima.'</div>
                    <hr>
                </div>
          </div>';
}