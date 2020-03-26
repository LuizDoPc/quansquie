<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 04/01/2018
 * Time: 09:34
 */

require_once '../../MODELO/TipoProduto.php';

$id = $_GET['id'];

$t = new TipoProduto($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rid_tipoProduto" name="Rid_tipoProduto" disabled value="'.$t->getIdTipoProduto().'">
                <label for="Rid_tipoProduto" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rnome_tipoProduto" name="Rnome_tipoProduto" disabled value="'.$t->getNome().'">
                <label for="Rnome_tipoProduto" class="active">Nome</label>
            </div>
        </div>';

echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate editavel" id="Rtamanho_tipoProduto" name="Rtamanho_tipoProduto" disabled value="'.$t->getTamanho().'">
                <label for="Rtamanho_tipoProduto" class="active">Tamanho</label>
            </div>
        </div>';
