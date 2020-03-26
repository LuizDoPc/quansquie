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

        #mat-selec{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

    </style>
</head>
<body>

<div id="nav"><?php include 'nav.html' ?></div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light red" id="salva_pna"><i class="material-icons">save</i></a>
</div>

<div class="" style="margin-top: 3vw;">
    <div class="row">
        <div class="col s12 l12">
            <div class="row center">
                <div class="col s12 l4 offset-l4">
                    <div class="flow-text" style="font-size: 30px">Adicionar Produto n&atilde;o acabado</div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 l5 push-l1">
                    <input type="text" id="nome_pna" maxlength="50">
                    <label for="nome_pna">Nome</label>
                </div>
                <div class="input-field col s12 l5 push-l1">
                    <select name="tipoProd_pna" id="tipoProd_pna">

                        <?php

                        $tp = new TipoProduto();
                        $res = $tp->findAll();

                        for($i=0; $i<count($res); $i++){
                            echo '<option value="'.$res[$i]->idTipoProduto.'">'.$res[$i]->Nome.'</option>';
                        }

                        ?>

                    </select>
                    <label for="tipoProd_pna">Selecione o tipo do produto</label>
                </div>
            </div>

            <div class="row">

            <div class="col s12 l5">
                    <div class="row center">
                        <div class="flow-text"><b>Mat&eacute;rias primas dispon&iacute;veis</b> | Subtotal: R$<span id="subtotal">0</span></div>
                    </div>

                    <div class="row">
                        <div class="col s8 l10">
                            <div class="input-field">
                                <select name="filtra_insumos" id="filtra_insumos">

                                    <?php

                                        $insumo = new Insumo();
                                        $res = $insumo->findAll();

                                        for($i=0; $i<count($res); $i++){
                                            echo '<option value="'.$res[$i]->idInsumo.'">'.$res[$i]->Nome.'</option>';
                                        }

                                    ?>

                                </select>
                                <label for="filtra_insumos">Selecione um insumo para filtrar</label>
                            </div>
                        </div>
                        <div class="col s2 l2">
                            <div class="btn waves-light waves-effect red" style="margin-top: 25px" id="filtra_materiaprima">Filtrar</div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="centered responsive-table bordered striped" style="overflow: auto">

                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                    <th>Tipo de insumo</th>
                                    <th>Opera&ccedil;&atilde;o</th>
                                </tr>
                            </thead>

                            <tbody id="resposta_materiaprima">


                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col s12 l5 push-l1">
                    <div class="row center">
                        <div class="flow-text"><b>Mat&eacute;rias primas selecionadas</b></div>
                    </div>

                    <div class="row">
                        <div id="mat-selec">

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
        var insumo;


        $('#'+id).children().each(function () {

            if($(this).data('tipo') == "nome"){
                nome = $(this).text();
            }
            if($(this).data('tipo') == "valor"){
                valor = $(this).text();
            }
            if($(this).data('tipo') == "insumo"){
                insumo = $(this).text();
            }
        });

        var valorreal = valor.substr(3, valor.length);

        var subtotal = $('#subtotal').text();
        subtotal = (parseFloat(subtotal)+parseFloat(valorreal));
        $('#subtotal').text(subtotal);

        $('#mat-selec').append(
            '                                <div>\n' +
            '                                    <div class="box-mat flow-text center materiaPrimaSelec" data-id="'+id+'" data-insumo="'+insumo+'" data-nome="'+nome+'" data-valor="'+valor+'">\n' +
            '                                        '+insumo+' - '+nome+'\n' +
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
        var insumo = $(this).parent().data('insumo');

        $('tbody').append('<tr id="'+id+'">\n' +
            '                                    <td data-tipo="nome">'+nome+'</td>\n' +
            '                                    <td data-tipo="valor">'+valor+'</td>\n' +
            '                                    <td data-tipo="insumo">'+insumo+'</td>\n' +
            '                                    <td><div class="op btn-color btn-floating btn" data-id="'+id+'"><i class="material-icons icone-vermelho">add</i></div></td>'+
            '                                </tr>');
        $(this).parent().parent().remove();
        var qtd = $('#mat-selec').data('qtd');
        qtd--;


        var valorreal = valor.substr(3, valor.length);

        var subtotal = $('#subtotal').text();
        subtotal = (parseFloat(subtotal)-parseFloat(valorreal));
        $('#subtotal').text(subtotal);
    });


    $(document).ready(function () {

        $(document).on('click', '#filtra_materiaprima', function () {

            $.get('../CONTROLE/Produto_nao_acabado/RetornaMateriaPrimaInsumo.php', {insumo:$('#filtra_insumos').val()}, function (res) {
                $('#resposta_materiaprima').html(res);
            });

        });


        $(document).on('click', '#salva_pna', function () {
            var cont = 0;
            $(this).hide();

            if(!$('#nome_pna').val()){
                alert('O campo Nome nao pode ser nulo.');
                $(this).show();
            }else
            $.get('../CONTROLE/Produto_nao_acabado/CadastraProdutoNaoAcabado.php', {nome:$('#nome_pna').val(), custo:$('#subtotal').text(), tp: $('#tipoProd_pna').val()}, function (id_pna) {

                $('.materiaPrimaSelec').each(function (index) {

                    $(this).delay(500*index).queue(function() {

                        var id_mp = $(this).data('id');

                        $.get('../CONTROLE/Produto_nao_acabado/RelacionaMpPna.php', {
                            id_pna: id_pna,
                            id_mp: id_mp
                        }, function (res) {
                            cont++;
                            if (cont == $('.materiaPrimaSelec').length) {
                                window.location.href = 'Produto_nao_acabado.php';
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