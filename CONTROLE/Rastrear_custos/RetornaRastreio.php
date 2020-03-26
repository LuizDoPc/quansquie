<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 22:35
 */

function __autoload ($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$id = $_GET['id'];

$pf = new ProdutoFinal($id);

echo '
<div class="col s12 l3 offset-l4" id="rastreio">

                    Produto Final: R$'.$pf->getCusto_Final_Primario().' <br>
                    &emsp;&emsp; Materia Prima: R$'.$pf->getProdutoNaoAcabadoIdProdutoNaoAcabado()->getCusto().' <br>';

$cp = new Compoe();
$rescp = $cp->findPna($pf->getProdutoNaoAcabadoIdProdutoNaoAcabado()->getIdProdutoNaoAcabado());
for($i=0; $i<count($rescp); $i++){
    $mp = new MateriaPrima($rescp[$i]->MateriaPrima_idMateriaPrima);
    echo '&emsp;&emsp;&emsp;&emsp; '.$mp->getNome().': R$'.$mp->getValor().' <br>';
}

$phpf = new ProcessohasProdutoFinal();
$respr = $phpf->findPf($id);

$totalpr=0;
for($i=0; $i<count($respr); $i++){
    $pr = new Processo($respr[$i]->Processo_idProcesso);
    $totalpr+=$pr->getValor();
}

echo'
                    &emsp;&emsp; Processo: R$'.$totalpr.' <br>';


for($i=0; $i<count($respr); $i++){
    $pr = new Processo($respr[$i]->Processo_idProcesso);
    echo '&emsp;&emsp;&emsp;&emsp; '.$pr->getNome().': R$'.$pr->getValor().' <br>';
}
echo '</div>';
