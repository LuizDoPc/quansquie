<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:04
 */

require_once '../../MODELO/Tipo.php';

$id = $_GET['id'];

$t = new Tipo($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rid_tipo" name="Rid_tipo" disabled value="'.$t->getIdTipo().'">
                <label for="Rid_tipo" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rnome_tipo" name="Rnome_tipo" disabled value="'.$t->getNome().'">
                <label for="Rnome_tipo" class="active">Nome</label>
            </div>
        </div>';
