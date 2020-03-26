<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 20:50
 */
require_once '../../MODELO/ProdutoNaoAcabado.php';
require_once '../../MODELO/TipoProduto.php';
require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Compoe.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';


$nome = $_GET['campo'];

$pna = new ProdutoNaoAcabado();

$res = $pna->findNome($nome);

for($i=0; $i<count($res); $i++){

    echo '
        <div class="col l4 s12 offset-l4 center resposta" data-id="'.$res[$i]->idProdutoNaoAcabado.'">
            <hr>
            <div class="flow-text dark">'.$res[$i]->Nome.'</div>
            <div class="flow-text light">'.$res[$i]->idProdutoNaoAcabado.'</div>
            <hr>
        </div>
    
    ';

}