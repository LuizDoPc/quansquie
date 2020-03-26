<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 22/01/2018
 * Time: 21:25
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

$nome = $_GET['nome'];

$pr = new Processo();

$res = $pr->findNome($nome);

for($i=0; $i<count($res); $i++){

    echo '
        <tr id="'.$res[$i]->idProcesso.'">
            <td data-tipo="nome">'.$res[$i]->Nome.'</td>
            <td data-tipo="valor">R$ '.$res[$i]->Valor.'</td>
            <td><div class="op btn-color btn-floating btn" data-id="'.$res[$i]->idProcesso.'"><i class="material-icons icone-vermelho">add</i></div></td>
        </tr>
    ';

}