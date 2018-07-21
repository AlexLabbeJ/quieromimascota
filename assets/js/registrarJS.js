function registrar() {
    window.location.href = base.base_url + "cuenta/registrar";
}
function tooltipoError(msj, input) {
    $("#group-" + input).removeClass("has-success");
    $("#" + input).focusin(function () {
        if ($("#" + input).siblings(".tooltipError-form").length <= 0){
            $("#" + input).after('<span class="tooltipError-form hidden-xs hidden-md hidden-sm">' + msj + '</span>').fadeIn(1000);
        }
        if ($("#group-" + input).siblings(".errorInputLogin").length <= 0){
            $("#group-" + input).focus().after("<div class='errorInputLogin col-md-4 col-sm-pull-3  visible-xs visible-md visible-sm'>" + msj + "</div>");
        }
    });
    $("#" + input).focusout(function () {
        $("#" + input).siblings(".tooltipError-form").remove();
        $("#group-" + input).siblings(".errorInputLogin").remove();
    });
    $("#group-" + input).addClass("has-error");
}
function eliminarToolTip(id) {
    $('#' + id).off('focusin focusout');
    $("#group-" + id).children(".tooltipError-form").remove();
    $("#group-" + id).siblings(".errorInputLogin").remove();
    $("#group-" + id).removeClass("has-error");
}
function validaciones() {
    var nError = 0;
    if ($("#nombre").val() == '') {
        tooltipoError("¿Como te llamas?", "nombre");
        nError++;
    } else {
        $("#group-nombre").removeClass("has-error");
        $("#group-nombre").addClass("has-success");
    }
    if ($("#apellidos").val() == '') {
        tooltipoError("¿Como te llamas?", "apellidos");
        nError++;
    } else {
        $("#group-apellidos").removeClass("has-error");
        $("#group-apellidos").addClass("has-success");
    }
    var sw = false;
    if ($("#num_celular").val() == '') {
        tooltipoError("tu n° de celular?", "num_celular");
        nError++;
    } else {
        sw = true;
        $("#group-num_celular").removeClass("has-error");
        $("#group-num_celular").addClass("has-success");
    }
    if ($("#num_fijo").val() == '' && !sw) {
        tooltipoError("tu n* fijo?", "num_fijo");
        nError++;
    } else {
        $("#group-num_fijo").removeClass("has-error");
        $("#group-num_fijo").addClass("has-success");
    }
    return nError;
}

function step(n, btn = "") {
    $('#step-1').toggleClass(".btn-circle-color-2");
    if ($("#" + btn).attr("disabled"))
        return false;
    switch (n) {
        case 1:
            $('#paso-1').removeClass("hidden");
            $('#paso-2').addClass("hidden");
            $('#paso-3').addClass("hidden");
            $("#step-1").css('background-color', '#04151f');
            $("#step-2").css('background-color', '#2c3e50');
            $("#step-3").css('background-color', '#2c3e50');

            break;
        case 2:
            if (validaciones() > 0)
                return false;
            $('#paso-1').addClass("hidden");
            $('#paso-2').removeClass("hidden");
            $('#step-2').removeAttr("disabled");
            $('#paso-3').addClass("hidden");
            $("#step-2").css('background-color', '#04151f');
            $("#step-1").css('background-color', '#2c3e50');
            $("#step-3").css('background-color', '#2c3e50');
            break;
        case 3:
            var nError = 0;
            if ($("#region").val() == "") {
                tooltipoError("¿En que region vives?", "region");
                nError++;
            } else {
                $("#group-region").removeClass("has-error");
                $("#group-region").addClass("has-success");
            }
            if ($("#comuna").val() == "") {
                tooltipoError("de que comuna eres?", "comuna");
                nError++;
            } else {
                $("#group-comuna").removeClass("has-error");
                $("#group-comuna").addClass("has-success");
            }
            nError += validaciones();
            if (nError > 0) {
                return false;
            }
            $("#step-3").css('background-color', '#04151f');
            $("#step-2").css('background-color', '#2c3e50');
            $("#step-1").css('background-color', '#2c3e50');
            $('#step-2').removeAttr("disabled");
            $('#paso-1').addClass("hidden");
            $('#paso-2').addClass("hidden");
            $('#step-3').removeAttr("disabled");
            $('#paso-3').removeClass("hidden");
            break;
}
}
$(document).ready(function () {
    $("#num_celular, #num_fijo").keydown(function (event) {
        if (event.shiftKey)
        {
            event.preventDefault();
        }

        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
        } else {
            if (event.keyCode < 95) {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.preventDefault();
                }
            } else {
                if (event.keyCode < 96 || event.keyCode > 105) {
                    event.preventDefault();
                }
            }
        }
    });
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $("#nombre, #apellidos, #num_fijo, #num_celular, #password, #password2").keyup(function () {
        if ($(this).val() != "") {
            let id = $(this).attr("id");
            eliminarToolTip(id);
            return false;
        }
    });
    $("#region, #comuna").change(function () {
        if ($(this).val() != "") {
            let id = $(this).attr("id");
            eliminarToolTip(id);
            return false;
        }
    });
    $("#email, #email2").keyup(function () {
        if ($(this).val() != "" && emailreg.test($(this).val())) {
            let id = $(this).attr("id");
            eliminarToolTip(id);
            return false;
        } else if ($("#email").val() == $("#email2").val()) {
            id = $(this).attr("id");
            eliminarToolTip(id);
            return false;
        }
    });
});
