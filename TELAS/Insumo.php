<?php
    require_once '../MODELO/Tipo.php';
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

    </style>
</head>
<body onload="atualizaLista()">

<div class="remodal" data-remodal-id="confirmation">
    <button data-remodal-action="close" class="remodal-close"></button>
    Tem certeza que deseja deletar? <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="apaga_insumo">Deletar</button>
</div>

<div class="remodal" data-remodal-id="modal">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="col s12 l4 offset-l4 center">
        <div class="flow-text">Inserir Insumos</div>
        <div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <input type="text" class="validate cadastro" id="nome_insumo" name="nome_insumo" maxlength="50">
                <label for="nome_insumo">Nome</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 l6 offset-l3">
                <select id="tipo_insumo" name="tipo_insumo">
                    <?php

                        $t = new Tipo();
                        $res = $t->findAll();

                        for($i=0; $i<count($res); $i++){
                            echo '<option value="'.$res[$i]->idTipo.'">'.$res[$i]->Nome.'</option>';
                        }

                    ?>
                </select>
                <label for="tipo_insumo">Tipo</label>
            </div>
        </div>
    </div>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="envia_insumo">Enviar</button>
</div>

<div class="remodal" data-remodal-id="detalhes">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="col s12 l4 offset-l4 center">
        <div class="flow-text">Detalhes</div>
        <div class="resposta_modal">

        </div>
    </div>
    <a data-remodal-target="confirmation"><button class="remodal-cancel"><i class="material-icons">delete_sweep</i></button></a>
    <button class="remodal-confirm" id="atualiza_insumo"><i class="material-icons">create</i></button>
    <button class="remodal-confirm" id="envia_atualiza_insumo"><i class="material-icons">send</i></button>
</div>

<div id="nav"><?php include 'nav.html' ?></div>

<div class="" style="margin-top: 3vw;">
    <div class="row">
        <div class="col s12 l12">
            <div class="row center">
                <div class="col s12 l4 offset-l4">
                    <div class="flow-text">Pesquisa Insumos</div>
                    <div class="input-field inline col s9 l8">
                        <input type="text" class="validae" id="pesquisa_insumo" name="pesquisa_insumo">
                        <label for="pesquisa_insumo">Pesquisa</label>
                    </div>
                    <div class="col s2 l2" style="margin-top: 22px">
                        <button class="btn waves-effect waves-light red" type="submit" name="envia_pesquisa" id="envia_pesquisa"><i class="material-icons">search</i></button>
                    </div>
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large waves-effect waves-light red" data-remodal-target="modal"><i class="material-icons">add</i></a>
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

    function atualizaLista(){
        $.get('../CONTROLE/Insumo/PesquisaInsumo.php', {campo:''}, function (res) {
            $('#resposta_pesquisa').html(res);
        });
    }

    function enviaPesquisa(){
        $.get('../CONTROLE/Insumo/PesquisaInsumo.php', {campo:$('#pesquisa_insumo').val()}, function (res) {
            $('#resposta_pesquisa').html(res);
        });
    }

    $(document).ready(function () {

        $('#envia_atualiza_insumo').hide();

        $(document).on('click', '#envia_insumo', function () {

            if(!$('#nome_insumo').val()){
                alert('O campo Nome nao pode ser nulo.');
            }else
            $.get('../CONTROLE/Insumo/CadastraInsumo.php', {nome:$('#nome_insumo').val(), tipo:$('#tipo_insumo').val()}, function () {
                var inst = $('[data-remodal-id=modal]').remodal();
                $('.cadastro').val('');
                inst.close();
                atualizaLista();
            });

        });

        $(document).on('click', '.resposta', function () {
            var inst = $('[data-remodal-id=detalhes]').remodal();

            $.get('../CONTROLE/Insumo/RetornaInsumo.php', {id:$(this).data('id')}, function (res) {
                $('.resposta_modal').html(res);
                $('select').material_select();
                inst.open();
            });
        });

        $(document).on('click', '#apaga_insumo', function () {
            var inst = $('[data-remodal-id=detalhes]').remodal();
            $.get('../CONTROLE/Insumo/ApagaInsumo.php', {id:$('#Rid_insumo').val()}, function (res) {
                atualizaLista();
                inst.close();

                if(res.length > 5){
                    alert('O objeto possui relações com outros elementos e não pode ser deletado.');
                }
            });
        });

        $(document).on('click', '#atualiza_insumo', function () {
            $('.editavel').attr('disabled', false);
            $('select').material_select();
            $(this).hide();
            $('#envia_atualiza_insumo').show();
        });

        $(document).on('click', '#envia_atualiza_insumo', function () {
            var inst = $('[data-remodal-id=detalhes]').remodal();
            if(!$('#Rnome_insumo').val()){
                alert('O campo Nome nao pode ser nulo.');
            }else
            $.get('../CONTROLE/Insumo/AtualizaInsumo.php', {id:$('#Rid_insumo').val(), nome:$('#Rnome_insumo').val(), tipo:$('#Rtipo_insumo').val()}, function () {
                atualizaLista();
                inst.close();
            });
        });

        $(document).on('closing', '.remodal', function (e) {
            $('.editavel').attr('disabled', true);
            $('#atualiza_insumo').show();
            $('#envia_atualiza_insumo').hide();
        });

        $(document).on('click', '#envia_pesquisa', function () {
            enviaPesquisa();
        });

        $(document).on('keypress', function (e) {
            if(e.which == 13 || e.keyCode == 13){
                enviaPesquisa();
            }
        });

    });

</script>

</body>
</html>