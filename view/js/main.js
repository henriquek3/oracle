$(document).ready(function () {
    $('select.dropdown').dropdown();

    var requestEstados = $.ajax({
        url: 'controller/estados.php',
        type: 'POST',
        dataType: 'text',
        data: {select: 'estados'},
    });
    requestEstados.done(function (estados) {
        console.log("Done!");
        console.log(estados);
        var sel = "";
        for (var key in estados) {
            sel += '"<option value="' + estados[key].UF + '">' + estados[key].DESCRICAO_UF + '</option>';
        }
        $("#estados").html(sel);
    });
    requestEstados.fail(function (e) {
        console.log("Fail!");
        console.log(e.msg);
    });
});