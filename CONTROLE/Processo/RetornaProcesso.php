<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/01/2018
 * Time: 13:44
 */

require_once '../../MODELO/Processo.php';

$id = $_GET['id'];

$t = new Processo($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rid_processo" name="Rid_processo" disabled value="'.$t->getIdProcesso().'">
                <label for="Rid_processo" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rnome_processo" name="Rnome_processo" disabled value="'.$t->getNome().'">
                <label for="Rnome_processo" class="active">Nome</label>
            </div>
        </div>';

echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rvalor_processo" name="Rvalor_processo" disabled value="'.$t->getValor().'">
                <label for="Rvalor_processo" class="active">Valor</label>
            </div>
        </div>';
