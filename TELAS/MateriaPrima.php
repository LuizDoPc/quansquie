<?php
    require_once '../MODELO/Insumo.php';
    require_once '../MODELO/Caracteristica.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SOFTWARE</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/remodal.css">
    <link rel="stylesheet" href="../CSS/remodal-default-theme.css">
    <link rel="stylesheet" href="../CSS/index.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">

    <script src="../JS/jquery-3.1.0.js"></script>
    <script src="../JS/materialize.min.js"></script>
    <script src="../JS/remodal.min.js"></script>
    <script src="../JS/index.js"></script>

    <style>

        nav{
            background:#fa6950;
        }
        nav li a{
            color: whitesmoke;
        }
        body{
            background: #ffffff;
        }

        .input-field input{
            color: #F44336;
        }
        .row .input-field input{
            color:#fc574f;
            border-bottom: 1px solid #F44336;
        }

        /* label focus color */
        .input-field input:focus + label, .input-field input + label {
            color: #F44336 !important;
        }
        /* label underline focus color */
        .row .input-field input:focus {
            border-bottom: 1px solid #F44336 !important;
            box-shadow: 0 1px 0 0 #F44336 !important
        }

        .btn-color{
            background: white;!important;
            border: 1px #F44336 solid;
        }

        .btn-floating i.icone-vermelho{
            color: #F44336;!important;
        }

        .btn-floating:hover{
            background: #bfbfbf;
        }

        #detalhe_carac_mp{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
        }

        .title-carac{
            font-size: 20px;
            font-weight: bold;
        }

        .detalhe-carac{
            font-size: 18px;
        }

    </style>
</head>
<body onload="atualizaLista()">

<div class="remodal" data-remodal-id="confirmation">
    <button data-remodal-action="close" class="remodal-close"></button>
    Tem certeza que deseja deletar? <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="apaga_materiaprima">Deletar</button>
</div>

<div class="remodal" data-remodal-id="modal">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="col s12 l4 offset-l4 center">
        <div class="flow-text">Inserir Mat&eacute;ria Prima</div>
        <div class="scroll-auto">
            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <input type="text" class="validate cadastro" id="nome_materiaprima" name="nome_materiaprima" maxlength="50">
                    <label for="nome_materiaprima">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <input type="number" class="validate cadastro" id="valor_materiaprima" name="valor_materiaprima" placeholder="R$">
                    <label for="valor_materiaprima">Valor</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <select id="insumo_materiaprima" name="insumo_materiaprima">

                        <?php

                            $insumo = new Insumo();

                            $res = $insumo->findAll();

                            for($i=0; $i<count($res); $i++){

                                echo '<option value="'.$res[$i]->idInsumo.'">'.$res[$i]->Nome.'</option>';

                            }

                        ?>

                    </select>
                    <label for="insumo_materiaprima">Insumo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <div class="flow-text pequeno">Selecionar Caracter&iacute;sticas</div>
                </div>
            </div>
            <div class="row center">
                <div class="col s12 l6 offset-l3">
                    <div class="btn-floating btn-color" id="novaCarac"><i class="material-icons icone-vermelho">add</i></div>
                    <div class="btn-floating btn-color" id="remCarac"><i class="material-icons icone-vermelho">remove</i></div>
                    <div class="btn-floating btn-color" id="addCarac"><i class="material-icons icone-vermelho">fiber_new</i></div>
                    <div class="btn-floating btn-color" id="editCarac"><i class="material-icons icone-vermelho">border_color</i></div>
                </div>
            </div>
            <div id="caracteristicas">

                <div class="row carac">
                    <div class="input-field col s12 l6 offset-l3">
                        <select class="caracteristica_materiaprima">

                            <?php

                            $carac = new Caracteristica();

                            $res = $carac->findAll();

                            for($i=0; $i<count($res); $i++){

                                echo '<option value="'.$res[$i]->idCaracteristica.'">'.$res[$i]->Nome.'</option>';

                            }

                            ?>

                        </select>
                        <label for="caracteristica_materiaprima">Carcteristica</label>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="envia_materiaprima">Enviar</button>
</div>

<div class="remodal" data-remodal-id="detalhes">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="col s12 l4 offset-l4 center">
        <div class="flow-text">Detalhes</div>
        <div class="scroll-auto">

            <div class="resposta_modal">


            </div>

        </div>
    </div>
    <a data-remodal-target="confirmation"><button class="remodal-cancel"><i class="material-icons">delete_sweep</i></button></a>
</div>


<div class="remodal" data-remodal-id="carac">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="col s12 l4 offset-l4 center">
        <div class="flow-text">Nova caracter&iacute;stica</div>
        <div class="scroll-auto">
            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <input type="text" class="validate cadastro" id="nome_caracteristica" name="nome_caracteristica" maxlength="50">
                    <label for="nome_caracteristica">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l6 offset-l3">
                    <input type="text" class="validate cadastro" id="descricao_caracteristica" name="descricao_caracteristica">
                    <label for="descricao_caracteristica">Descri&ccedil;&atilde;o</label>
                </div>
            </div>
        </div>
    </div>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="envia_caracteristica">Enviar</button>
</div>


<div class="remodal_edit_caracteristica remodal" data-remodal-id="editcarac">
    <button data-remodal-action="close" class="remodal-close"></button>

    <div id="resposta_edit_caracteristica"></div>

    <button data-remodal-action="cancel" class="remodal-cancel"><i class="material-icons">cancel</i></button>
    <button class="remodal-cancel" id="apaga_caracteristica"><i class="material-icons">delete_sweep</i></button>
    <button class="remodal-confirm" id="envia_atualiza_caracteristica"><i class="material-icons">send</i></button>
</div>



<div id="nav"><?php include 'nav.html' ?></div>

<div class="" style="margin-top: 3vw;">
    <div class="row">
        <div class="col s12 l12">
            <div class="row center">
                <div class="col s12 l4 offset-l4">
                    <div class="flow-text">Pesquisa Mat&eacute;ria Prima</div>
                    <div class="input-field inline col s9 l8">
                        <input type="text" class="validae" id="pesquisa_materiaprima" name="pesquisa_materiaprima">
                        <label for="pesquisa_materiaprima">Pesquisa</label>
                    </div>
                    <div class="col s2 l2" style="margin-top: 22px">
                        <button class="btn waves-effect waves-light red" type="submit" name="pesquisa"><i class="material-icons">search</i></button>
                    </div>
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large waves-effect waves-light red" data-remodal-target="modal" id="abre_modal_add"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l12" id="resposta_pesquisa">

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function novaCaracteristica() {
        $.get('../CONTROLE/Caracteristica/RetornaAllCaracteristica.php', function(res){
            $('#caracteristicas').append('<div class="row carac">\n' +
                '                <div class="input-field col s12 l6 offset-l3">\n' +
                '                    <select class="caracteristica_materiaprima">\n' +
                res +
                '                    </select>\n' +
                '                    <label for="caracteristica_materiaprima">Carcteristica</label>\n' +
                '                </div>\n' +
                '            </div>');

            $('select').material_select();
        });
    }

    $(document).on('click', '#novaCarac', function () {
        novaCaracteristica();
    });

    $(document).on('click', '#remCarac', function () {
        $('#caracteristicas .carac').last().remove();
    });



    /*--------------------------------SCRIPTS CRUD MATERIA PRIMA----------------------INICIO-----------------*/


    function atualizaLista(){
        $.get('../CONTROLE/MateriaPrima/PesquisaMateriaPrima.php', {campo:''}, function (res) {
            $('#resposta_pesquisa').html(res);
        });
    }

    function enviaPesquisa(){
        $.get('../CONTROLE/MateriaPrima/PesquisaMateriaPrima.php', {campo:$('#pesquisa_materiaprima').val()}, function (res) {
            $('#resposta_pesquisa').html(res);
        });
    }

    $(document).ready(function () {

        $('select').material_select();

        $(document).on('click', '#envia_materiaprima', function () {
            $('#abre_modal_add').hide();
            if(!$('#nome_materiaprima').val()){
                alert('O campo Nome nao pode ser nulo.');
            }else
            $.get('../CONTROLE/MateriaPrima/CadastraMateriaPrima.php', {nome:$('#nome_materiaprima').val(), valor:$('#valor_materiaprima').val(), insumo:$('#insumo_materiaprima').val()}, function (res) {
                var idmp;
                var idcr;
                $('.caracteristica_materiaprima').each(function (index) {
                    $(this).delay(500*index).queue(function() {
                        if($(this).is('select')){
                            idmp = res;
                            idcr = $(this).val();
                            $.get('../CONTROLE/Caracteristica_has_MateriaPrima/RelacionaCaracMatPri.php', {mp:idmp, cr:idcr}, function () {
                                if(index == $('.caracteristica_materiaprima').length){
                                    var inst = $('[data-remodal-id=modal]').remodal();
                                    $('.cadastro').val('');
                                    inst.close();
                                }
                            });
                        }
                    });
                });

                atualizaLista();
            });

        });

        $(document).on('click', '.resposta', function () {
            var inst = $('[data-remodal-id=detalhes]').remodal();

            $.get('../CONTROLE/MateriaPrima/RetornaMateriaPrima.php', {id:$(this).data('id')}, function (res) {
                $('.resposta_modal').html(res);
                inst.open();
            });
        });

        $(document).on('click', '#apaga_materiaprima', function () {
            var inst = $('[data-remodal-id=detalhes]').remodal();
            $.get('../CONTROLE/MateriaPrima/ApagaMateriaPrima.php', {id:$('#Rid_materiaprima').val()}, function (res) {
                atualizaLista();
                inst.close();

                if(res.length > 5){
                    alert('O objeto possui relações com outros elementos e não pode ser deletado.');
                }
            });
        });

        $(document).on('click', '#envia_pesquisa', function () {
            enviaPesquisa();
        });

        $(document).on('keypress', function (e) {
            if(e.which == 13 || e.keyCode == 13){
                enviaPesquisa();
            }
        });

        $(document).on('closed', '.remodal', function () {
            setTimeout(function () {
                $('#abre_modal_add').show();
            }, 1000);
        });
        $(document).on('opening', '.remodal', function () {
            $('#caracteristicas').html('');
            novaCaracteristica();
        });

    });


    /*--------------------------------SCRIPTS CRUD MATERIA PRIMA----------------------FINAL-----------------*/




    /*--------------------------------SCRIPTS CARACTERISTICAS----------------------INICIO-----------------*/



    $(document).on('click', '#addCarac', function () {

        var modalMP = $('[data-remodal-id=modal]').remodal();
        var modalCR = $('[data-remodal-id=carac]').remodal();

        modalMP.close();
        modalCR.open();

    });

    $(document).on('click', '#envia_caracteristica', function () {

        $.get('../CONTROLE/Caracteristica/CadastraCaracteristica.php', {nome:$('#nome_caracteristica').val(), descricao:$('#descricao_caracteristica').val()}, function (res) {
            var inst = $('[data-remodal-id=carac]').remodal();
            $('.cadastro').val('');
            inst.close();
            atualizaLista();
            $('#caracteristicas').html('');
            novaCaracteristica();
            $('select').material_select();
        });

    });

    $(document).on('click', '#editCarac', function () {
        var inst =  $('[data-remodal-id=editcarac]').remodal();
        inst.open();
    });

    $(document).on('click', '#envia_atualiza_caracteristica', function () {
        $.get('../CONTROLE/Caracteristica/AtualizaCaracteristica.php', {id:$('#edit_caracteristica').val(), nome:$('#novo_nome_caracteristica').val(), descricao:$('#nova_descricao_caracteristica').val()}, function () {
            var inst = $('[data-remodal-id=editcarac]').remodal();
            inst.close();
        });

    });

    $(document).on('click', '#apaga_caracteristica', function () {
       $.get('../CONTROLE/Caracteristica/ApagaCaracteristica.php', {id:$('#edit_caracteristica').val()}, function (res) {
           var inst = $('[data-remodal-id=editcarac]').remodal();
           inst.close();

           if(res.length > 5){
               alert('O objeto possui relações com outros elementos e não pode ser deletado.');
           }
       });
    });

    $(document).on('opening', '.remodal_edit_caracteristica', function () {
        $.get('../CONTROLE/Caracteristica/RetornaEditCaracteristica.php', function (res) {
            $('#resposta_edit_caracteristica').html(res);
            $('select').material_select();
        });
    });

    /*--------------------------------SCRIPTS CARACTERISTICAS----------------------FINAL-----------------*/


</script>

</body>
</html>