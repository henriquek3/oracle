$(document).ready(function () {
    $('select.dropdown').dropdown();

    var requestEstados = $.ajax({
        url: 'controller/estados.php',
        type: 'POST',
        dataType: 'json',
        data: {param1: 'value1'},
    })
    requestEstados.done(function (e) {
        console.log("Done!");
        console.log(e.msg);
        var sel = "";
        for (var key in e) {
            sel += '"<option value="' + e[key].estados + '">' + e[key].uf_descricao + '</option>';
        }
        console.log(sel.uf);
    });
    requestEstados.fail(function (e) {
        console.log("Fail!");
        console.log(e.msg);
    });
});