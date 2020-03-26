<?php
    require_once '../MODELO/ProdutoNaoAcabado.php';
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

        tr{
            text-align: center;!important;
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

        #proc-selec{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

    </style>
</head>
<body>

<div id="nav"><?php include 'nav.html' ?></div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light red" id="salva_pf"><i class="material-icons">save</i></a>
</div>

<div class="" style="margin-top: 3vw;">
    <div class="row">
        <div class="col s12 l12">
            <div class="row center">
                <div class="col s12 l4 offset-l4">
                    <div class="flow-text" style="font-size: 30px">Adicionar Produto final</div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 l5 push-l1">
                    <input type="text" id="nome_pf" maxlength="50">
                    <label for="nome_pf">Nome</label>
                </div>
                <div class="input-field col s12 l5 push-l1">
                    <select name="pna_pf" id="pna_pf">

                        <?php

                        $tp = new ProdutoNaoAcabado();
                        $res = $tp->findAll();

                        for($i=0; $i<count($res); $i++){
                            echo '<option value="'.$res[$i]->idProdutoNaoAcabado.'">'.$res[$i]->Nome.'</option>';
                        }

                        ?>

                    </select>
                    <label for="pna_pf">Selecione o produto</label>
                </div>
            </div>

            <div class="row">

                <div class="col s12 l5">
                    <div class="row center">
                        <div class="flow-text"><b>Processos dispon&iacute;veis</b> | Subtotal: R$<span id="subtotal">0</span></div>
                    </div>

                    <div class="row">
                        <div class="col s8 l10">
                            <div class="input-field">
                                <input type="text" id="filtra_processos">
                                <label for="filtra_processos">Filtro de processos</label>
                            </div>
                        </div>
                        <div class="col s2 l2">
                            <div class="btn waves-light waves-effect red" style="margin-top: 25px" id="filtra_processo">Filtrar</div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="centered responsive-table bordered striped" style="overflow: auto">

                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Opera&ccedil;&atilde;o</th>
                            </tr>
                            </thead>

                            <tbody id="resposta_processos">


                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col s12 l5 push-l1">
                    <div class="row center">
                        <div class="flow-text"><b>Processos selecionadas</b></div>
                    </div>

                    <div class="row">
                        <div id="proc-selec">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).on('click', '.op', function () {
        var id = $(this).data('id');

        var nome;
        var valor;

        $('#'+id).children().each(function () {

            if($(this).data('tipo') == "nome"){
                nome = $(this).text();
            }
            if($(this).data('tipo') == "valor"){
                valor = $(this).text();
            }
        });

        var valorreal = valor.substr(3, valor.length);

        var subtotal = $('#subtotal').text();
        subtotal = (parseFloat(subtotal)+parseFloat(valorreal));
        $('#subtotal').text(subtotal);

            $('#proc-selec').append(
                '                                <div >\n' +
                '                                    <div class="box-mat flow-text center processoSelec" data-id="'+id+'" data-nome="'+nome+'" data-valor="'+valor+'">\n' +
                '                                        '+nome+'\n' +
                '                                        <br>\n' +
                '                                        '+valor+'\n' +
                '                                        <br>\n' +
                '                                        <div class="btn btn-floating rem btn-color"><i class="material-icons icone-vermelho">remove</i></div>\n' +
                '                                    </div>\n' +
                '                                </div>\n'
                );


        $('#'+id).remove();

    });

    $(document).on('click', '.rem', function(){
        var id = $(this).parent().data('id');
        var nome = $(this).parent().data('nome');
        var valor = $(this).parent().data('valor');

        $('tbody').append('<tr id="'+id+'">\n' +
            '                                    <td data-tipo="nome">'+nome+'</td>\n' +
            '                                    <td data-tipo="valor">'+valor+'</td>\n' +
            '                                    <td><div class="op btn-color btn-floating btn" data-id="'+id+'"><i class="material-icons icone-vermelho">add</i></div></td>'+
            '                                </tr>');
        $(this).parent().parent().remove();
        var qtd = $('#proc-selec').data('qtd');
        qtd--;

        var valorreal = valor.substr(3, valor.length);

        var subtotal = $('#subtotal').text();
        subtotal = (parseFloat(subtotal)-parseFloat(valorreal));
        $('#subtotal').text(subtotal);
    });

    $(document).ready(function () {

        $(document).on('click', '#filtra_processo', function () {

            $.get('../CONTROLE/Produto_final/FiltraProcesso.php', {nome:$('#filtra_processos').val()}, function (res) {
                $('#resposta_processos').html(res);
            });

        });


        $(document).on('click', '#salva_pf', function () {
            var cont = 0;
            $(this).hide();
            if(!$('#nome_pf').val()){
                alert('O campo Nome nao pode ser nulo.');
                $(this).show();
            }else
            $.get('../CONTROLE/Produto_final/CadastraProdutoFinal.php', {nome:$('#nome_pf').val(), custo:$('#subtotal').text(), pna: $('#pna_pf').val()}, function (id_pf) {

                $('.processoSelec').each(function (index) {

                    $(this).delay(500*index).queue(function() {

                        var id_pr = $(this).data('id');

                        $.get('../CONTROLE/Produto_final/RelacionaPfPr.php', {id_pf:id_pf, id_pr:id_pr}, function (res) {
                            cont++;
                            if(cont == $('.processoSelec').length){
                                window.location.href = 'Produto_final.php';
                            }
                        });

                    });

                });

            });

        });

    });

</script>

</body>
</html>