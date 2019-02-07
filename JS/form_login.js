$(document).ready(function () {

    function mostrar() {
        let tagNameInputs = document.getElementsByTagName("input");
        let long = tagNameInputs.length;
        let bool = true;
        let longJ = long - 3;
        let cont;
        let divDisabled = document.getElementById("bd_user");
        for (let i = 0; i <= long; i++) {
            if (tagNameInputs[i] !== undefined) {
                if (bool) {
                    let attName = tagNameInputs[i].getAttribute('name');
                    let tagTypeInputs = tagNameInputs[i].getAttribute("type");
                    if (attName !== 'apodo' && attName !== 'pass' && tagTypeInputs !== 'submit') {
                        cont = 0;
                        for (let j = 0; j <= longJ; j++) {
                            let attNameJ = tagNameInputs[j].getAttribute('name');
                            if (attNameJ !== 'apodo' && attNameJ !== 'pass' && tagTypeInputs !== 'submit') {
                                if (tagNameInputs[j].value === '') {
                                    bool = false;
                                    break;
                                } else {
                                    cont++;
                                }
                            }
                        }
                    }
                }
            }
        }

        if (cont === longJ) {
            $('#bd_user').slideDown('slow');
            // divDisabled.hidden = false;
            document.getElementById('apodo').disabled = false;
            document.getElementById('pass').disabled = false;
            document.getElementsByClassName('button-submit centr')[0].disabled = false;
        }
    }

    document.getElementById('formulario').addEventListener('input', function () {
        mostrar();
    });


});

