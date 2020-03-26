<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/01/2018
 * Time: 13:44
 */

require_once '../../MODELO/Processo.php';

$campo = $_GET['campo'];

$t = new Processo();

$res = $t->findNome($campo);


for($i=0; $i<count($res); $i++){

    echo '<div class="row">
                <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idProcesso.'">
                    <hr>
                    <div class="flow-text dark">'.$res[$i]->Nome.'</div>
                    <div class="flow-text light">'.$res[$i]->idProcesso.'</div>
                    <hr>
                </div>
          </div>';
}