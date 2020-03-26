<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/01/2018
 * Time: 11:42
 */

require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';

$insumo = $_GET['insumo'];

$mp = new MateriaPrima();

$res = $mp->findInsumo($insumo);

for($i=0; $i<count($res); $i++){

    $in = new Insumo($res[$i]->Insumo_idInsumo);

    echo '
        <tr id="'.$res[$i]->idMateriaPrima.'">
            <td data-tipo="nome">'.$res[$i]->Nome.'</td>
            <td data-tipo="valor">R$ '.$res[$i]->Valor.'</td>
            <td data-tipo="insumo">'.$in->getNome().'</td>
            <td><div class="op btn-color btn-floating btn" data-id="'.$res[$i]->idMateriaPrima.'"><i class="material-icons icone-vermelho">add</i></div></td>
        </tr>
    ';

}