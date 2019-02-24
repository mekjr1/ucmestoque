

function validarOnclick() {

    //elemento input para buscar seus atributos
    var validar = document.getElementsByClassName("validar");

    //elemento p para escrever as mensagens de validacao
    var invalido = document.getElementsByClassName("invalido");

    //elemento label para buscar o seu conteudo e atributos
    var label = document.getElementsByClassName("label-validar");

    //variavel de incremento
    var i;

//Expresões regulares para atributo pattern
//    ^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$                           email
//    ^8[2-7]{1}[0-9]{7}                                                                            telefone
//    ^[1-9][0-9]{11}[A-Za-z]{2}$                                                                   BI 
//    ^8[2-7]{1}[0-9]{7}|^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$        email ou telefone 



    for (i = 0; i < validar.length; i++) {

        //velidar atributo pattern
        if (validar[i].validity.patternMismatch) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " invalido!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " invalido!");
        }

        //validar atributo min
        if (validar[i].validity.rangeUnderflow) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " minimo é " + validar[i].min + "!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " minimo é " + validar[i].min + "!");
        }

        //validar atributo max
        if (validar[i].validity.rangeOverflow) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " maximo é " + validar[i].max + "!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " maximo é " + validar[i].max + "!");
        }


        //validar atributo maxlenght
        if (validar[i].validity.tooLong) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " deve conter " + validar[i].maxlength + " caracteres no maximo!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " deve conter " + validar[i].maxlength + " caracteres no maximo!");
        }


        //validar atributo type
        if (validar[i].validity.typeMismatch) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " inválido!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " inválido!");
        }

        //validar atributo required
        if (validar[i].validity.valueMissing) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.add("form-invalido");
            validar[i].classList.remove("invalido");
            invalido[i].innerHTML = label[i].innerHTML + " é requirido!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " é requirido!");
        }

        if (!(validar[i].checkValidity())) {
            invalido[i].classList.remove("invisivel");
            validar[i].classList.remove("invalido");
            validar[i].classList.add("form-invalido");
            invalido[i].innerHTML = label[i].innerHTML + " invalido!";
//            invalido[i].setCustomValidity(label[i].innerHTML + " invalido!");
        }
    }
}



function validaroninput(idInput, idP, ipLabel) {

    //elemento input para buscar seus atributos
    var validar = document.getElementById("" + idInput);

    //elemento p para escrever as mensagens de validacao
    var invalido = document.getElementById("" + idP);

    //elemento label para buscar o seu conteudo e atributos
    var label = document.getElementById("" + ipLabel);


//    if (!(validar.validity.valueMissing)) {
//        invalido.innerHTML = "";
//        invalido.classList.add("invisivel");
//        validar.classList.remove("form-invalido");
//        validar.classList.add("form-valido");
//    }
//
//    if ((validar.checkValidity())) {
//        invalido.innerHTML = "";
//        invalido.classList.add("invisivel");
//        validar.classList.remove("form-invalido");
//        validar.classList.add("form-valido");
//    }

//velidar atributo pattern
    if (!validar.validity.patternMismatch) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }

    //validar atributo min
    if (!validar.validity.rangeUnderflow) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }

    //validar atributo max
    if (!validar.validity.rangeOverflow) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }


    //validar atributo maxlenght
    if (!validar.validity.tooLong) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }


    //validar atributo type
    if (!validar.validity.typeMismatch) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }

    //validar atributo required
    if (!validar.validity.valueMissing) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }

    if ((validar.checkValidity())) {
        invalido.innerHTML = "";
        invalido.classList.add("invisivel");
        validar.classList.remove("form-invalido");
        validar.classList.add("form-valido");
    }

























    //invalidos 
    
//velidar atributo pattern
    if (validar.validity.patternMismatch) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " invalido!";
//        invalido.setCustomValidity(label.innerHTML + " invalido!");
    }

    //validar atributo min
    if (validar.validity.rangeUnderflow) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " minimo é " + validar.min + "!";
//        invalido.setCustomValidity(label.innerHTML + " minimo é " + validar.min + "!");
    }

    //validar atributo max
    if (validar.validity.rangeOverflow) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " maximo é " + validar.max + "!";
//        invalido.setCustomValidity(label.innerHTML + " maximo é " + validar.max + "!");
    }


    //validar atributo maxlenght
    if (validar.validity.tooLong) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " deve conter " + validar.maxlength + " caracteres no maximo!";
//        invalido.setCustomValidity(label.innerHTML + " deve conter " + validar.maxlength + " caracteres no maximo!");
    }


    //validar atributo type
    if (validar.validity.typeMismatch) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " inválido!";
//        invalido.setCustomValidity(label.innerHTML + " inválido!");
    }

    //validar atributo required
    if (validar.validity.valueMissing) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " é requirido!";
//        invalido.setCustomValidity(label.innerHTML + " é requirido!");
    }

    if (!(validar.checkValidity())) {
        validar.classList.remove("form-valido");
        validar.classList.add("form-invalido");
        invalido.classList.remove("invisivel");
        invalido.innerHTML = label.innerHTML + " invalido!";
//        invalido.setCustomValidity(label.innerHTML + " invalido!");
    }    

//    if (validar.validity.valueMissing) {
//        validar.classList.remove("form-valido");
//        validar.classList.add("form-invalido");
//        invalido.classList.remove("invisivel");
//        invalido.innerHTML = label.innerHTML + " é requirido";
//    }
//
//    if (!(validar.checkValidity())) {
//        invalido.classList.remove("invisivel");
//        validar.classList.add("form-invalido");
//    }

}
