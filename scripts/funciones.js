// CAMBIOS

function rango_rama(elemento, id_input_de_grades) { //inputgradeperfil o inputgrade
    const id_rama = elemento.value
    // alert(id_input)
    $.ajax({
        url: './partials/grado_rama.php',
        type: 'post',
        data: { id_nombrerama: id_rama },
        dataType: 'json',//formato con el que se envian las cosas
        success: function (respuestita) {//respuestita es lo que devuelve el php con el echo 

            let largo = respuestita.length;
            $("#" + id_input_de_grades).empty();

            $("#" + id_input_de_grades).append("<option hidden='hidden' disabled selected>--- Seleccione ---</option>")
            for (let i = 0; i < largo; i++) {
                let id_grades = respuestita[i]['id_grades']
                let name_grades = respuestita[i]['name_grades']

                $("#" + id_input_de_grades).append("<option value='" + id_grades + "' > " + name_grades + " </option>")
            }
        }
    });
}


//esta funcion recibe como parametro el id del usuario (desde la base de datos) para traer los registros 
function busca_user(id_user) {
    $.ajax({
        url: './partials/iduser.php',
        type: 'post',
        data: { id_usuarioaphp: id_user },
        dataType: 'json',
        success: function (respuesta) {
            let largo = respuesta.length;
            $('#inputIDUser').val(respuesta[0]['id_user'])
            $('#inputNameUser').val(respuesta[0]['username'])
            $('#inputLastNameUser').val(respuesta[0]['userlastname'])
            $('#inputDniUser').val(respuesta[0]['dni'])
            $('#inputRoleUser').val(respuesta[0]['id_rol'])
            $('#inputCountryUser').val(respuesta[0]['id_country'])
            $('#inputBranche').val(respuesta[0]['id_branches'])
            $('#inputGrade').val(respuesta[0]['id_grades'])
            $('#inputEmailUser').val(respuesta[0]['email'])
        }
    })
}



//esta funcion recibe como parametro el id del soldado (desde la base de datos) para traer los registros 
function busca_soldier(id_soldier) {
    $.ajax({
        url: './partials/idsoldier.php',
        type: 'post',
        data: { id_soldieraphp: id_soldier },
        dataType: 'json',
        success: function (respuesta) {
            let largo = respuesta.length;
            $('#input_idSoldier').val(respuesta[0]['id_soldier'])
            $('#inputNameSoldier').val(respuesta[0]['name_soldier'])
            $('#inputLastNameSoldier').val(respuesta[0]['lastname'])
            $('#inputDniSoldier').val(respuesta[0]['dni'])
            $('#inputEdad').val(respuesta[0]['age'])
            $('#inputNac').val(respuesta[0]['date_birth'])
            $('#inputCountrySoldier').val(respuesta[0]['id_country'])
            $('#inputBranche').val(respuesta[0]['id_branches'])
            $('#inputGrade').val(respuesta[0]['id_grades'])
            $('#inputStatus').val(respuesta[0]['id_status'])
            $('#inputUnit').val(respuesta[0]['unit'])
            $('#inputAdmision').val(respuesta[0]['date_admission'])
            $('#inputDeath').val(respuesta[0]['date_death'])
            $('#inputLugar').val(respuesta[0]['place_death'])
        },
        error: function (request, status, error) {
            console.error(request.responseText);
        }

    })
}


function registra_usuario() {
    //funcion para que los datos no se borren del formulario si es que ya esta registrado
    let nameUser = $("#inputNameUser").val();
    let lastnameUser = $("#inputLastNameUser").val();
    let dniUser = $("#inputDniUser").val();
    let emailUser = $("#inputEmailUser").val();
    let passUser = $("#inputPasswordUser").val();
    let roleUser = $("#inputRoleUser").val();
    let countryUser = $("#inputCountry").val();
    let brancheUser = $("#inputBranche").val();
    let gradeUser = $("#inputGrade").val();



    $.ajax({
        url: './partials/addUsuario.php',
        type: 'post',
        data: { nameuser: nameUser, lastnameuser: lastnameUser, dniuser: dniUser, emailuser: emailUser, passworduser: passUser, rol: roleUser, pais: countryUser, rama: brancheUser, grado: gradeUser},
        dataType: 'json',
        success: function (respuesta) {
            //let largo = respuesta.length;

            $("#respuesta").html(respuesta);
        },
        error: function (request, status, error) {
            //console.error(request.responseText);
            $("#respuesta").html(request.responseText);
        }
    })

}
function registra_combatiente() {
    //funcion para que los datos no se borren del formulario si es que ya esta registrado
    let nameSoldier = $("#inputName").val();
    let lastnameSoldier = $("#inputLastName").val();
    let dniSoldier = $("#inputDni").val();
    let edadSoldier = $("#inputEdad").val();
    let admisionSoldier = $("#inputAdmision").val();
    let statusSoldier = $("#inputStatus").val();
    let muerteSoldier = $("#inputDeath").val();
    let unidadSoldier = $("#inputUnit").val();
    let lugarSoldier = $("#inputLugar").val();
    let nacSoldier = $("#inputNac").val();
    let countrySoldier = $("#inputCountry").val();
    let brancheSoldier = $("#inputBranche").val();
    let gradeSoldier = $("#inputGrade").val();




    $.ajax({
        url: './partials/addCombatiente.php',
        type: 'post',
        data: { namesoldier: nameSoldier, lastnamesoldier: lastnameSoldier, dnisoldier: dniSoldier, edadsoldier: edadSoldier, admision: admisionSoldier, estado: statusSoldier, grado: gradeSoldier, muerte: muerteSoldier, unidad: unidadSoldier, lugar: lugarSoldier, pais: countrySoldier, nacimiento: nacSoldier, rama: brancheSoldier},
        dataType: 'json',
        success: function (respuesta) {
            //let largo = respuesta.length;

            $("#respuesta").html(respuesta);

        },
        error: function (request, status, error) {
            //console.error(request.responseText);
            $("#respuesta").html(request.responseText);
        }

    })



}





function delete_soldier(id_soldier) {
    $.ajax({
        url: './partials/deleteCombatiente.php',
        type: 'post',
        data: { id_deleteSoldieraphp: id_soldier },
        dataType: 'json',
        success: function (respuesta) {
            alert(respuesta)
        },
        error: function (request, status, error) {
            console.error(request.responseText);
        }

    })
}


function delete_user(id_user) {
    $.ajax({
        url: './partials/deleteUsuario.php',
        type: 'post',
        data: { id_deleteUseraphp: id_user },
        dataType: 'json',
        success: function (respuesta) {
            alert(respuesta)
        },
        error: function (request, status, error) {
            console.error(request.responseText);
        }

    })
}

