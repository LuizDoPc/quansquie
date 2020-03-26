<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/02/2018
 * Time: 10:03
 */

function __autoload($class_name){
    require_once '../../MODELO/'.$class_name.'.php';
}

echo '

    <div class="row">
        <div class="input-field s12 l4 offset-l4 center">
            <select id="edit_caracteristica">
';

                $carac = new Caracteristica();

                $res = $carac->findAll();

                for($i=0; $i<count($res); $i++){

                    echo '<option value="'.$res[$i]->idCaracteristica.'">'.$res[$i]->Nome.'</option>';

                }

echo'

            </select>
            <label for="edit_caracteristica">Carcteristica</label>
        </div>
    </div>


    <div class="row">
        <div class="input-field s12 l4 offset-l4 center">
            <input type="text" maxlength="50" class="validate" id="novo_nome_caracteristica">
            <label for="novo_nome_caracteristica">Novo nome</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field s12 l4 offset-l4 center">
            <input type="text" maxlength="50" class="validate" id="nova_descricao_caracteristica">
            <label for="nova_descricao_caracteristica">Nova descri&ccedil;&atilde;o</label>
        </div>
    </div>

';