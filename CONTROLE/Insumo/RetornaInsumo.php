<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 10:21
 */

require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';
$id = $_GET['id'];

$i = new Insumo($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rid_insumo" name="Rid_insumo" disabled value="'.$i->getIdInsumo().'">
                <label for="Rid_insumo" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rnome_insumo" name="Rnome_insumo" disabled value="'.$i->getNome().'">
                <label for="Rnome_insumo" class="active">Nome</label>
            </div>
        </div>';

echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                
                <select name="Rtipo_insumo" id="Rtipo_insumo" class="editavel" disabled>
                ';

                    $t = new Tipo();
                    $res = $t->findAll();

                    for($k=0; $k<count($res); $k++){
                        if($res[$k]->idTipo == $i->getTipo_idTipo()->getIdTipo())echo '<option value="'.$res[$k]->idTipo.'" selected>'.$res[$k]->Nome.'</option>';
                        else echo '<option value="'.$res[$k]->idTipo.'">'.$res[$k]->Nome.'</option>';
                    }

                echo'
                </select>
                
                <label for="Rtipo_insumo" class="active">Tipo</label>
            </div>
        </div>';
