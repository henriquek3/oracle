$(document).ready(function () {
    $('select.dropdown').dropdown();
    var requestEstados = $.ajax({
        url: 'controller/estados.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: 'estados'
        }
    });
    requestEstados.done(function (estados) {
        console.log("requestEstados Done!");
        var sel = '';
        for (var key in estados) {
            sel += '<option value="' + estados[key].UF + '">' + estados[key].DESCRICAO_UF + '</option>';
        }
        $("#estados").html(sel);
    });
    requestEstados.fail(function (e) {
        console.log("requestEstados Fail!");
        console.log(e);
        $("#help").html(e.responseText);
    });
    $("#estados").change(function () {
        //var est = $(this).val();
        var est = "MT";
        console.log(est);
        var ufEst = $.ajax({
            url: 'controller/estados.php',
            type: 'POST',
            dataType: 'json',
            data: {
                where: est
            }
        });
        ufEst.done(function (cd) {
            console.log("ufEst Done!");
            console.log(cd)
            var cid = "";
            for (var k in cd) {
                cid += '"<option value="' + cd[k].SEQ_PLA_CIDADES + '">' + cd[k].NOME_CIDADE + '</option>';
            }
            $("#cidades").html(cid);
        });
        ufEst.fail(function (e) {
            console.log("ufEst Fail!");
            console.log(e);
            $("#help").html(e.responseText);
        });
    });
    $("#formClientes").submit(function () {
        var form = $(this).serialize();
        console.log(form);
        return false;
    });

});