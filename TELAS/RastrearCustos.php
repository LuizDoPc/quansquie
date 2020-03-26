<?php
    function __autoload($class_name){
        require_once '../MODELO/'.$class_name.'.php';
    }
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

        .box{
            background: lightgray;
            font-size: 20px;
            cursor: pointer;
        }
        .box_content{
            padding:5px;
            display: inline-block;
        }
        .arrow{
            font-size: 20px;
            padding: 5px;
            float: right;
            display: inline-block;
        }
        #rastreio{
            font-size: 25px;
        }
    </style>
</head>
<body>

<div id="nav"><?php include 'nav.html' ?></div>

<div class="" style="margin-top: 3vw;">
    <div class="row">
        <div class="col s12 l12">
            <div class="row center">
                <div class="col s12 l4 offset-l4">
                    <div class="flow-text">Rastrear custos</div>
                    <div class="input-field inline col s9 l8">
                        <select name="filtra_pf" id="filtra_pf">

                            <?php

                            $pf = new ProdutoFinal();
                            $res = $pf->findAll();

                            for($i=0; $i<count($res); $i++){
                                echo '<option value="'.$res[$i]->idProdutoFinal.'">'.$res[$i]->Nome.'</option>';
                            }

                            ?>

                        </select>
                        <label for="pesquisa_cor">Filtro produto final</label>
                    </div>
                    <div class="col s2 l2" style="margin-top: 22px">
                        <button class="btn waves-effect waves-light red" type="submit" id="envia_pesquisa"><i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="" id="resposta_pesquisa">


                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        $(document).on('click', '#envia_pesquisa', function () {

            $.get('../CONTROLE/Rastrear_custos/RetornaRastreio.php', {id:$('#filtra_pf').val()}, function (res) {
               $('#resposta_pesquisa').html(res);
            });

        });


    });

</script>

</body>
</html>