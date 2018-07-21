var base = {
  base_url:  "http://localhost/"
};
function logout() {
    var urlActual = window.location.href;
    $.ajax({
        url: base.base_url + 'cuenta/logout',
        type: 'POST',
        success: function (response) {
            if (response == 1) {
                window.location = urlActual;
            }
        }
    });

}
$(document).ready(function() {
    if($(window).width()<800){
            $('#panel_cat_index').removeClass('btn-group btn-group-justified');
            $('#panel_cat_index').addClass('btn-group cat_index');
        }
});
$(window).on('resize', function() {
  var win = $(this);
  if (win.width() < 800) {
    $('#panel_cat_index').removeClass('btn-group btn-group-justified');
    $('#panel_cat_index').addClass('btn-group cat_index');

  }else{
    $('#panel_cat_index').addClass('btn-group');
    $('#panel_cat_index').addClass('btn-group-justified');
    $('#panel_cat_index').removeClass('btn-group cat_index');
  }
});
function abrirLoginModal() {
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    $("#emailLogin").focus();
    span.onclick = function () {
        modal.style.display = "none";
    };
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}
$(document).ready(function () {
    $("#emailLogin").keyup(function (e) {
        if (e.keyCode == 13) {
            login();
        }
    });
    $("#passwordLogin").keyup(function (e) {
        if (e.keyCode == 13) {
            login();
        }
    });
});
function login(btnlogin, emailLogin, passwordLogin, idForm = "") {
    var data = null;
    var urlActual = null;
    if (idForm != "") {
        data = $("#" + idForm).serialize();
    } else {
        urlActual = $("#urlActual").val();
        data = $("#form_login").serialize();
    }
    $(".errorInputLogin").remove();
    $.ajax({
        url: base.base_url + 'cuenta/login',
        type: 'POST',
        data: data,
        dataType: "JSON",
        beforeSend: function () {
            $("#" + btnlogin).val("Entrando...");
            $("#" + btnlogin).attr("disabled", "disabled");
        },
        success: function (response) {
            $("#alertLogin").remove();
            if (response.sucess) {
                if (response.sucess == 0) {
                    //no existe el email
                    $(".table-login").after('<div class="error-msj" id="alertLogin">El E-Mail ingresado no esta registrado en el sistema!</div>');
                    $("#" + emailLogin).val("");
                    $("#" + passwordLogin).val("");
                    $("#" + emailLogin).focus();
                    $("#" + btnlogin).val("Login");
                    $("#" + btnlogin).removeAttr("disabled");
                    setTimeout(function () {
                        $("#alertLogin").fadeOut("slow");
                    }, 3000);
                } else if (response.sucess == 2) {
                    //contraseña incorrecta
                    $(".table-login").after('<div class="error-msj" id="alertLogin">Contraseña incorrecta!</div>');
                    $("#" + passwordLogin).val("");
                    $("#" + passwordLogin).focus();
                    $("#" + btnlogin).val("Login");
                    $("#" + btnlogin).removeAttr("disabled");
                    setTimeout(function () {
                        $("#alertLogin").fadeOut("slow");
                    }, 3000);
                } else if (response.sucess == 1) {
                    window.location = urlActual != null ? urlActual : base.base_url;
                }
            } else {
                if (response.email != "") {
                    $(".email").focus().after(response.email);
                    $(".email").addClass("has-error");
                } else {
                    $('.email').removeClass("has-error");
                    $('.email').addClass("has-success");
                }
                if (response.password != "") {
                    $(".password").focus().after(response.password);
                    $(".password").addClass("has-error");
                } else {
                    $('.password').removeClass("has-error");
                    $('.password').addClass("has-success");
                }
                $("#" + btnlogin).val("Login");
                $("#" + btnlogin).removeAttr("disabled");
            }
        }
    });
}
$(document).ready(function () {
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $("#emailLogin").keyup(function () {
        if ($(this).val() != "" && emailreg.test($(this).val())) {
            $(".errorInputLogin").fadeOut();
            $("#emailLogin").removeAttr('style');
            $("#emailLogin").attr('style', 'width:95%;');
            return false;
        }
    });
    $("#passwordLogin").keyup(function () {
        if ($(this).val() != "") {
            $(".errorInputLogin").fadeOut();
            $("#passwordLogin").removeAttr('style');
            $("#passwordLogin").attr('style', 'width:95%;');
            return false;
        }
    });
});
function actualizarUsuario() {
    $(".tooltipError-form").remove();
    var data = $("#form_update").serialize();
    $.ajax({
        url: base.base_url + 'cuenta/actualizarperfil',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function (response) {
            if (response.success) {
                if (response.success == 1) {
                    $("#h2").after('<div class="success-msj" id="alert">Datos actualizados correctamente!.</div>');
                    setTimeout(function () {
                        $("#alert").fadeOut("slow");
                    }, 3000);
                }
            } else {

                if (response.nombre_user != '') {
                    $("#nombre_user").focus().after(response.nombre_user);
                } else if (response.apellidos_user != '') {
                    $("#apellidos_user").focus().after(response.apellidos_user);
                } else if (response.numcelu_user != '') {
                    $("#numcelu_user").focus().after(response.numcelu_user);
                } else if (response.region_user != '') {
                    $("#region_user").focus().after(response.region_user);
                } else if (response.comuna_user != '') {
                    $("#comuna_user").focus().after(response.comuna_user);
                }

            }
        }
    });
}
function cambiarPass() {
    $(".tooltipError-form").remove();
    var data = $("#form_cambiarpass").serialize();
    $.ajax({
        url: base.base_url + 'cuenta/cambiarPassword',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function (response) {
            if (response.success) {
                if (response.success == 1) {
                    $("#h2").after('<div class="success-msj" id="alert">Datos actualizados correctamente, se le recomienda cerrar sesión y luego volver a iniciar!.</div>');
                    $("#passactual_user").val("");
                    $("#passnueva1_user").val("");
                    $("#passnueva2_user").val("");
                    setTimeout(function () {
                        $("#alert").fadeOut("slow");
                    }, 5000);
                }
            } else {

                if (response.passactual_user != '') {
                    if (response.success == 0) {
                        $("#passactual_user").focus().after("<span class='tooltipError-form'>Contraseña incorrecta!</span>");
                    }
                    $("#passactual_user").focus().after(response.passactual_user);
                } else if (response.passnueva1_user != '') {
                    $("#passnueva1_user").focus().after(response.passnueva1_user);
                } else if (response.passnueva2_user != '') {
                    $("#passnueva2_user").focus().after(response.passnueva2_user);
                }

            }
        }
    });
}
