<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 20:57
 */

require_once '../../MODELO/ProdutoNaoAcabado.php';
require_once '../../MODELO/TipoProduto.php';
require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Compoe.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';

$id = $_GET['id'];


$pna = new ProdutoNaoAcabado($id);
$cp = new Compoe();

$rescp = $cp->findPna($id);

echo '
    <br>
    <input type="hidden" id="Rid_pna" value="'.$pna->getIdProdutoNaoAcabado().'">
    <div class="row">Nome: '.$pna->getNome().'</div>
        <div class="row">Custo: R$'.$pna->getCusto().'</div>
        <div class="row">Tipo Produto: '.$pna->getTipoProduto_idTipoProduto()->getNome().'</div>
        <br>
        <div class="row"><b>Mat&eacute;rias primas</b></div>
        <div id="mps">

';


for($i=0; $i<count($rescp); $i++){

    $mp = new MateriaPrima($rescp[$i]->MateriaPrima_idMateriaPrima);

    echo '
        <div>
            <div class="flow-text center">
            '.$mp->getInsumoIdInsumo()->getNome().' - '.$mp->getNome().'
            <br>
            R$'.$mp->getValor().'
            <br>
            </div>
        </div>
    
    ';
}

echo '</div>';
