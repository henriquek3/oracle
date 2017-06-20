//função para Alterar o visibility da div filiais-options
function visibleFilial() {
    var fil = document.getElementsByClassName('filiais-options');
    fil[0].style.visibility = "visible";
};

//Seleção da div empresa
var emp = document.getElementsByClassName('empresa-option');
//Selecionando todos as tags button dentro de 'emp' -> criando array
var empButton = emp[0].querySelectorAll('button');
//percorrendo array de buttons e adicionando funções
for (var i = 0; i < empButton.length; i++) {
    //Adicionando função visibleFilial() no evento onclick
    empButton[i].addEventListener('click', visibleFilial);
    //outro método de adicionar uma função (showCustomer) no evento 'onclick'
    empButton[i].onclick = (
        function () {
            showCustomer(
                //Interessante destacar aqui o this.value que é o valor do botão.
                this.value
            )
        });
}
;

function showCustomer(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('filiais').innerHTML = this.responseText;
        }
    };
    //Enviando requisição por get para o arquivo ajax.php
    xhttp.open("GET", "ajax.php?empresa=" + str, true);
    xhttp.send();
};