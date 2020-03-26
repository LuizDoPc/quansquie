<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 21:24
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$nome = $_GET['campo'];

$pf = new ProdutoFinal();

$res = $pf->findNome($nome);

for($i=0; $i<count($res); $i++){

    echo '
        <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idProdutoFinal.'">
            <hr>
            <div class="flow-text dark">'.$res[$i]->Nome.'</div>
            <div class="flow-text light">'.$res[$i]->idProdutoFinal.'</div>
            <hr>
        </div>
    
    ';

}