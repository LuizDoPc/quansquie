<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 20/11/2017
 * Time: 09:57
 */

require_once '../MODELO/Cor.php';

$id = $_GET['id'];

$c = new Cor($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="id_cor" name="id_cor" disabled value="'.$c->getIdCor().'">
                <label for="id_cor" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="nome_cor" name="nome_cor" disabled value="'.$c->getNome().'">
                <label for="nome_cor" class="active">Nome</label>
            </div>
        </div>';
