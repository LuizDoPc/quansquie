<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 22:21
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$id = $_GET['id'];


$pf = new ProdutoFinal($id);
$phpf = new ProcessohasProdutoFinal();

$resphpf = $phpf->findPf($id);

echo '
    <br>
    <input type="hidden" id="Rid_pf" value="'.$pf->getIdProdutoFinal().'">
    <div class="row">Nome: '.$pf->getNome().'</div>
        <div class="row">Custo final primario: R$'.$pf->getCusto_Final_Primario().'</div>
        <div class="row">Produto não acabado: '.$pf->getProdutoNaoAcabadoIdProdutoNaoAcabado()->getNome().'</div>
        <br>
        <div class="row"><b>Processos</b></div>
        <div id="prs">

';


for($i=0; $i<count($resphpf); $i++){

    $pr = new Processo($resphpf[$i]->Processo_idProcesso);

    echo '
        <div>
            <div class="flow-text center">
            '.$pr->getNome().'
            <br>
            R$'.$pr->getValor().'
            <br>
            </div>
        </div>
    
    ';
}

echo '</div>';