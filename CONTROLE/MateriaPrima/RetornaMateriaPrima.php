<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 07/01/2018
 * Time: 19:45
 */

require_once '../../MODELO/MateriaPrima.php';
require_once '../../MODELO/Insumo.php';
require_once '../../MODELO/Tipo.php';
require_once '../../MODELO/CaracteristicahasMateriaPrima.php';
require_once '../../MODELO/Caracteristica.php';

$id = $_GET['id'];

$i = new MateriaPrima($id);


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rid_materiaprima" name="Rid_materiaprima" disabled value="'.$i->getIdMateriaPrima().'">
                <label for="Rid_materiaprima" class="active">ID</label>
            </div>
        </div>';


echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rnome_materiaprima" name="Rnome_materiaprima" disabled value="'.$i->getNome().'">
                <label for="Rnome_materiaprima" class="active">Nome</label>
            </div>
        </div>';

echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate" id="Rvalor_materiaprima" name="Rvalor_materiaprima" disabled value="'.$i->getValor().'">
                <label for="Rvalor_materiaprima" class="active">Valor</label>
            </div>
        </div>';

echo '<div class="row">
            <div class="input-field col s12 l6 offset-l3">
                
                <select name="Rinsumo_materiaprima" id="Rinsumo_materiaprima" disabled>
                ';

$t = new Insumo();
$res = $t->findAll();

for($k=0; $k<count($res); $k++){
    if($res[$k]->idInsumo == $i->getInsumoIdInsumo()->getIdInsumo())echo '<option value="'.$res[$k]->idInsumo.'" selected>'.$res[$k]->Nome.'</option>';
    else echo '<option value="'.$res[$k]->idInsumo.'">'.$res[$k]->Nome.'</option>';
}

echo'
                </select>
                
                <label for="Rinsumo_materiaprima" class="active">Insumo</label>
            </div>
        </div>';



$carachasmp = new CaracteristicahasMateriaPrima();

$carachasmpRES = $carachasmp->findMP($id);

echo '

<span style="font-weight: bold; font-size: 22px">CARACTER&Iacute;STICAS</span>
<br>
<br>

<div id="detalhe_carac_mp">
';

for($i=0; $i<count($carachasmpRES); $i++){

    $carac = new Caracteristica($carachasmpRES[$i]->Caracteristica_idCaracteristica);

    echo '<div>
        
        <div class="row">
            <div class="col s12 l6 offset-l3 title-carac">
                ';

                    echo $carac->getNome();

                echo'
            </div>        
        </div>
    
        <div class="row">
            <div class="col s12 l6 offset-l3 detalhe-carac">
                ';

                    echo $carac->getDescricao();

                echo'
            </div>
        </div>
     
    </div>   ';

}
echo'
</div>
';
